<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class WikiPage extends Model
{
    use SoftDeletes, Searchable;

    protected $fillable = [
        'parent_id', 'title', 'slug', 'full_slug', 'excerpt', 'body', 'body_html',
        'featured_image', 'icon_svg', 'meta_title', 'meta_description', 'og_image',
        'status', 'published_at', 'sort_order', 'reading_time_minutes', 'last_edited_by',
    ];

    protected static function booted(): void
    {
        static::saving(function (WikiPage $page) {
            if (! $page->slug) {
                $page->slug = Str::slug($page->title);
            }

            $oldFullSlug = $page->getOriginal('full_slug');
            $page->full_slug = $page->buildFullSlug();

            if ($page->body) {
                $renderer = app(\App\Services\MarkdownRenderer::class);
                $result = $renderer->render($page->body);
                $page->body_html = $result->html;
                $page->reading_time_minutes = $result->readingTime;
            }

            // Auto-create redirect when full_slug changes (for existing pages)
            if ($page->exists && $oldFullSlug && $oldFullSlug !== $page->full_slug) {
                WikiRedirect::firstOrCreate(
                    ['old_slug' => $oldFullSlug],
                    ['wiki_page_id' => $page->id, 'created_at' => now()]
                );
            }
        });

        // Auto-create revision before updating (snapshot previous state)
        static::updating(function (WikiPage $page) {
            if ($page->isDirty(['title', 'body'])) {
                WikiRevision::create([
                    'wiki_page_id' => $page->id,
                    'title' => $page->getOriginal('title'),
                    'body' => $page->getOriginal('body'),
                    'faqs' => $page->faqs->map->only(['question', 'answer', 'sort_order'])->toArray(),
                    'user_id' => auth()->id(),
                    'created_at' => now(),
                ]);

                // Prune old revisions (keep last 25)
                $page->revisions()->skip(25)->take(100)->get()->each->delete();
            }
        });

    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'sort_order' => 'integer',
            'reading_time_minutes' => 'integer',
        ];
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'body' => strip_tags($this->body_html ?? ''),
        ];
    }

    // Relationships

    public function parent(): BelongsTo
    {
        return $this->belongsTo(WikiPage::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(WikiPage::class, 'parent_id');
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(WikiFaq::class)->orderBy('sort_order');
    }

    public function revisions(): HasMany
    {
        return $this->hasMany(WikiRevision::class)->latest('created_at');
    }

    public function relatedPages(): BelongsToMany
    {
        return $this->belongsToMany(WikiPage::class, 'wiki_page_relations', 'page_id', 'related_page_id')
            ->withPivot('sort_order')
            ->orderByPivot('sort_order');
    }

    // Scopes

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    // Helpers

    public function buildFullSlug(): string
    {
        if ($this->parent_id && $this->parent) {
            return $this->parent->slug . '/' . $this->slug;
        }

        return $this->slug;
    }

    public function isCategory(): bool
    {
        return $this->parent_id === null;
    }

    public function previousPage(): ?WikiPage
    {
        return static::where('parent_id', $this->parent_id)
            ->published()
            ->where('sort_order', '<', $this->sort_order)
            ->orderByDesc('sort_order')
            ->first();
    }

    public function nextPage(): ?WikiPage
    {
        return static::where('parent_id', $this->parent_id)
            ->published()
            ->where('sort_order', '>', $this->sort_order)
            ->ordered()
            ->first();
    }

    public function breadcrumbs(): array
    {
        $crumbs = [['label' => 'Features', 'url' => route('wiki.index')]];

        if ($this->parent) {
            $crumbs[] = [
                'label' => $this->parent->title,
                'url' => route('wiki.show', $this->parent->full_slug),
            ];
        }

        $crumbs[] = ['label' => $this->title, 'url' => ''];

        return $crumbs;
    }

    public function getUrlAttribute(): string
    {
        return route('wiki.show', $this->full_slug);
    }

    public function displayTitle(): string
    {
        return $this->meta_title ?: $this->title . ' — EMAS eKYC';
    }

    public function displayDescription(): ?string
    {
        return $this->meta_description ?: $this->excerpt;
    }

    public function extractToc(): array
    {
        if (! $this->body_html) {
            return [];
        }

        $toc = [];
        preg_match_all('/<h([23])\s[^>]*id="([^"]*)"[^>]*>(.*?)<a\s/s', $this->body_html, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $toc[] = [
                'level' => (int) $match[1],
                'id' => $match[2],
                'text' => strip_tags($match[3]),
            ];
        }

        return $toc;
    }
}

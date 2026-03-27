<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['wiki_page_id', 'title', 'body', 'faqs', 'user_id', 'created_at'])]
class WikiRevision extends Model
{
    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'faqs' => 'array',
            'created_at' => 'datetime',
        ];
    }

    public function wikiPage(): BelongsTo
    {
        return $this->belongsTo(WikiPage::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

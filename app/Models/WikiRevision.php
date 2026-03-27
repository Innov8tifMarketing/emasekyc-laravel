<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WikiRevision extends Model
{
    public $timestamps = false;

    protected $fillable = ['wiki_page_id', 'title', 'body', 'faqs', 'user_id', 'created_at'];

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

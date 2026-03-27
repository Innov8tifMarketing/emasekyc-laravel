<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['wiki_page_id', 'helpful', 'comment', 'ip_hash', 'created_at'])]
class WikiFeedback extends Model
{
    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'helpful' => 'boolean',
            'created_at' => 'datetime',
        ];
    }

    public function wikiPage(): BelongsTo
    {
        return $this->belongsTo(WikiPage::class);
    }
}

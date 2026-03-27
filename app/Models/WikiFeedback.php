<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WikiFeedback extends Model
{
    public $timestamps = false;

    protected $fillable = ['wiki_page_id', 'helpful', 'comment', 'ip_hash', 'created_at'];

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

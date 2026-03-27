<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['wiki_page_id', 'question', 'answer', 'sort_order'])]
class WikiFaq extends Model
{

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    public function wikiPage(): BelongsTo
    {
        return $this->belongsTo(WikiPage::class);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wiki_page_relations', function (Blueprint $table) {
            $table->foreignId('page_id')->constrained('wiki_pages')->cascadeOnDelete();
            $table->foreignId('related_page_id')->constrained('wiki_pages')->cascadeOnDelete();
            $table->integer('sort_order')->default(0);

            $table->primary(['page_id', 'related_page_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wiki_page_relations');
    }
};

<?php

namespace App\Services;

class MarkdownResult
{
    public function __construct(
        public readonly string $html,
        public readonly array $toc,
        public readonly int $readingTime,
    ) {}
}

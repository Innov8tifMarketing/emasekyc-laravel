<?php

namespace App\Services;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\MarkdownConverter;

class MarkdownRenderer
{
    private MarkdownConverter $converter;

    public function __construct()
    {
        $config = [
            'heading_permalink' => [
                'html_class' => 'heading-permalink',
                'id_prefix' => '',
                'apply_id_to_heading' => true,
                'heading_class' => '',
                'fragment_prefix' => '',
                'insert' => 'after',
                'min_heading_level' => 2,
                'max_heading_level' => 3,
                'symbol' => '#',
                'aria_hidden' => true,
            ],
        ];

        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new GithubFlavoredMarkdownExtension());
        $environment->addExtension(new HeadingPermalinkExtension());
        $environment->addExtension(new AttributesExtension());

        $this->converter = new MarkdownConverter($environment);
    }

    public function render(string $markdown): MarkdownResult
    {
        // Pre-process custom blocks before CommonMark parsing
        $processed = $this->preprocessBlocks($markdown);
        $html = $this->converter->convert($processed)->getContent();
        $toc = $this->extractToc($html);
        $readingTime = $this->calculateReadingTime($html);

        return new MarkdownResult($html, $toc, $readingTime);
    }

    private function preprocessBlocks(string $markdown): string
    {
        // Process :::type blocks into HTML before CommonMark handles them
        return preg_replace_callback(
            '/^:::(\w[\w-]*)(?:\[([^\]]*)\])?\s*(.*?)$\n(.*?)^:::\s*$/ms',
            function ($matches) {
                $type = $matches[1];
                $param = $matches[2] ?? '';
                $title = trim($matches[3]);
                $content = $matches[4];

                return match ($type) {
                    'callout' => $this->renderCallout($param ?: 'info', $title, $content),
                    'details' => $this->renderDetails($title, $content),
                    'grid-2' => $this->renderGrid(2, $content),
                    'grid-3' => $this->renderGrid(3, $content),
                    'grid-4' => $this->renderGrid(4, $content),
                    'checklist' => $this->renderChecklist($content),
                    'video' => $this->renderVideo($param ?: 'youtube', $title),
                    default => $matches[0],
                };
            },
            $markdown
        );
    }

    private function renderCallout(string $type, string $title, string $content): string
    {
        $iconMap = [
            'info' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 shrink-0 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            'warning' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 shrink-0 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>',
            'success' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 shrink-0 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            'error' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 shrink-0 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        ];
        $icon = $iconMap[$type] ?? $iconMap['info'];
        $titleHtml = $title ? "<h4 class=\"font-bold\">{$title}</h4>" : '';

        return "<div class=\"alert alert-{$type} my-4\">{$icon}<div>{$titleHtml}\n\n{$content}\n\n</div></div>";
    }

    private function renderDetails(string $summary, string $content): string
    {
        return "<details class=\"collapse collapse-arrow bg-base-200 my-4\"><summary class=\"collapse-title font-medium\">{$summary}</summary><div class=\"collapse-content\">\n\n{$content}\n\n</div></details>";
    }

    private function renderGrid(int $cols, string $content): string
    {
        // Split content by h3 headings (### ) to create grid columns
        $sections = preg_split('/^###\s+/m', $content, -1, PREG_SPLIT_NO_EMPTY);
        $html = "<div class=\"not-prose\"><div class=\"grid sm:grid-cols-{$cols} gap-6 my-6\">";

        foreach ($sections as $section) {
            $lines = explode("\n", trim($section), 2);
            $heading = trim($lines[0]);
            $body = trim($lines[1] ?? '');

            $html .= "<div><h3 class=\"font-semibold mb-2\">{$heading}</h3>\n\n{$body}\n\n</div>";
        }

        $html .= '</div></div>';

        return $html;
    }

    private function renderChecklist(string $content): string
    {
        $checkSvg = '<svg class="w-5 h-5 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
        $lines = array_filter(array_map('trim', explode("\n", $content)));
        $items = '';

        foreach ($lines as $line) {
            // Strip leading "- " or "* " if present
            $line = preg_replace('/^[-*]\s*/', '', $line);
            if ($line === '') {
                continue;
            }
            $items .= "<li class=\"flex items-start gap-2\">{$checkSvg}<span>{$line}</span></li>\n";
        }

        return "<ul class=\"not-prose space-y-2 my-4\">\n{$items}</ul>";
    }

    private function renderVideo(string $platform, string $id): string
    {
        $id = trim($id);

        if ($platform === 'youtube') {
            $src = "https://www.youtube-nocookie.com/embed/{$id}";
        } elseif ($platform === 'vimeo') {
            $src = "https://player.vimeo.com/video/{$id}";
        } else {
            return '';
        }

        return "<div class=\"not-prose aspect-video my-4\"><iframe src=\"{$src}\" class=\"w-full h-full rounded-lg\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen loading=\"lazy\"></iframe></div>";
    }

    private function extractToc(string $html): array
    {
        $toc = [];
        preg_match_all('/<h([23])\s[^>]*id="([^"]*)"[^>]*>(.*?)<a\s/s', $html, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $toc[] = [
                'level' => (int) $match[1],
                'id' => $match[2],
                'text' => strip_tags($match[3]),
            ];
        }

        return $toc;
    }

    private function calculateReadingTime(string $html): int
    {
        $wordCount = str_word_count(strip_tags($html));

        return max(1, (int) ceil($wordCount / 200));
    }
}

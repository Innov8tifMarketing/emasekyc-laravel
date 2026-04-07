<?php

namespace App\Console\Commands;

use App\Models\LandingPage;
use App\Models\Post;
use App\Models\WikiPage;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

#[Signature('app:generate-sitemap')]
#[Description('Generate the sitemap.xml file')]
class GenerateSitemap extends Command
{
    public function handle(): int
    {
        $sitemap = Sitemap::create();

        // Static pages
        $staticPages = ['/', '/about', '/careers', '/why-us', '/contact', '/solutions', '/features', '/resources'];
        foreach ($staticPages as $path) {
            $sitemap->add(Url::create($path)->setPriority(0.8));
        }

        // Landing pages
        LandingPage::published()->each(function (LandingPage $page) use ($sitemap) {
            $sitemap->add(
                Url::create("/solutions/landing-pages/{$page->slug}")
                    ->setLastModificationDate($page->updated_at)
                    ->setPriority(0.7)
            );
        });

        // Wiki pages
        WikiPage::published()->each(function (WikiPage $page) use ($sitemap) {
            $sitemap->add(
                Url::create("/features/{$page->full_slug}")
                    ->setLastModificationDate($page->updated_at)
                    ->setPriority(0.9)
            );
        });

        // Blog posts
        Post::published()->each(function (Post $post) use ($sitemap) {
            $sitemap->add(
                Url::create("/resources/knowledge-hub/{$post->slug}")
                    ->setLastModificationDate($post->updated_at)
                    ->setPriority(0.6)
            );
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully.');

        return self::SUCCESS;
    }
}

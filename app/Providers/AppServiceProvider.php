<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Post;
use App\Models\SiteScript;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.layout', function ($view) {
            $scripts = Cache::remember('site_scripts', 3600, function () {
                return SiteScript::active()->get()->groupBy('location');
            });

            $view->with('siteScripts', $scripts);
        });

        View::composer('pages.home', function ($view) {
            $view->with('recentPosts', Cache::remember('homepage_posts', 60, function () {
                return Post::published()->with('tags')->latest('published_at')->take(3)->get();
            }));
            $view->with('clients', Cache::remember('homepage_clients', 60, function () {
                return Client::active()->ordered()->get();
            }));
        });
    }
}

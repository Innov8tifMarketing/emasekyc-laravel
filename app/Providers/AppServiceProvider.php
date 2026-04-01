<?php

namespace App\Providers;

use App\Events\LeadCaptured;
use App\Listeners\SendLeadNotification;
use App\Listeners\ZohoCrmSyncListener;
use App\Models\Client;
use App\Models\Post;
use App\Models\SiteScript;
use App\Models\WikiPage;
use App\Services\MarkdownRenderer;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(MarkdownRenderer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(LeadCaptured::class, SendLeadNotification::class);
        Event::listen(LeadCaptured::class, ZohoCrmSyncListener::class);

        View::composer('components.layout', function ($view) {
            $view->with('siteScripts', SiteScript::active()->get()->groupBy('location'));
        });

        View::composer('components.nav', function ($view) {
            $view->with('navigation', config('navigation'));
        });

        View::composer('pages.home', function ($view) {
            $view->with('recentPosts', Post::published()->with('tags')->latest('published_at')->take(3)->get());
            $view->with('clients', Client::active()->ordered()->get());
            $view->with('featureCategories', WikiPage::published()->root()
                ->with(['children' => fn ($q) => $q->published()->ordered()])
                ->ordered()
                ->get()
            );
        });

    }
}

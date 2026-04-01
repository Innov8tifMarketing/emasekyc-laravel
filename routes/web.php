<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WikiPageController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::view('/', 'pages.home')->name('home');

// Company
Route::view('/about', 'pages.about')->name('about');
Route::view('/careers', 'pages.careers')->name('careers');
Route::view('/why-us', 'pages.why-us')->name('why-us');

// Contact
Route::view('/contact', 'pages.contact')->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');
Route::post('/contact/quick', [ContactController::class, 'quickStore'])->middleware('throttle:3,1')->name('contact.quick');

// Newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'store'])->middleware('throttle:3,1')->name('newsletter.subscribe');

// Features (wiki)
Route::prefix('features')->name('wiki.')->group(function () {
    Route::get('/', [WikiPageController::class, 'index'])->name('index');
    Route::get('/search', [WikiPageController::class, 'search'])->name('search');
    Route::post('/{wikiPage}/feedback', [WikiPageController::class, 'feedback'])
        ->middleware('throttle:3,1')->name('feedback');
    Route::get('/{path}', [WikiPageController::class, 'show'])
        ->where('path', '.*')->name('show');
});

// Solutions
Route::prefix('solutions')->name('solutions.')->group(function () {
    Route::view('/', 'pages.solutions.index')->name('index');
    Route::view('/ekyc-for-developers', 'pages.solutions.developers')->name('developers');
    Route::view('/ekyc-for-sme-corporations', 'pages.solutions.sme-corporations')->name('sme-corporations');
    Route::view('/emas-cida', 'pages.solutions.emas-cida')->name('emas-cida');

    // Dynamic landing pages (CMS-driven)
    Route::prefix('landing-pages')->name('landing.')->group(function () {
        Route::get('/{landingPage:slug}', [LandingPageController::class, 'show'])->name('show');
        Route::post('/{landingPage:slug}/submit', [LandingPageController::class, 'submit'])
            ->middleware('throttle:5,1')->name('submit');
        Route::get('/{landingPage:slug}/thank-you', [LandingPageController::class, 'thankYou'])->name('thank-you');
    });
});

// Resources
Route::prefix('resources')->name('resources.')->group(function () {
    Route::view('/', 'pages.resources.index')->name('index');
    Route::view('/privacy-policy', 'pages.resources.privacy-policy')->name('privacy-policy');
    Route::view('/events', 'pages.resources.events')->name('events');
    Route::view('/guides-reports', 'pages.resources.guides-reports')->name('guides-reports');

    // Knowledge Hub (DB-backed blog)
    Route::get('/knowledge-hub', [PostController::class, 'index'])->name('knowledge-hub.index');
    Route::get('/knowledge-hub/{post:slug}', [PostController::class, 'show'])->name('knowledge-hub.show');
});

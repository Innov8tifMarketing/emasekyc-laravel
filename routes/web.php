<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::view('/', 'pages.home')->name('home');

// Company
Route::view('/about', 'pages.about')->name('about');
Route::view('/careers', 'pages.careers')->name('careers');

// Contact
Route::view('/contact', 'pages.contact')->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');

// Features & Components
Route::prefix('features-and-components')->name('features.')->group(function () {
    Route::view('/', 'pages.features.index')->name('index');

    Route::prefix('identity-verification')->name('identity-verification.')->group(function () {
        Route::view('/', 'pages.features.identity-verification.index')->name('index');
        Route::view('/facial-matching', 'pages.features.identity-verification.facial-matching')->name('facial-matching');
        Route::view('/remote-and-video-verification', 'pages.features.identity-verification.remote-video-verification')->name('remote-video-verification');
        Route::view('/id-data-extraction', 'pages.features.identity-verification.id-data-extraction')->name('id-data-extraction');
        Route::view('/id-verification', 'pages.features.identity-verification.id-verification')->name('id-verification');
        Route::view('/liveness-detection', 'pages.features.identity-verification.liveness-detection')->name('liveness-detection');
    });

    Route::prefix('user-screening')->name('user-screening.')->group(function () {
        Route::view('/', 'pages.features.user-screening.index')->name('index');
        Route::view('/digital-footprint-analysis', 'pages.features.user-screening.digital-footprint-analysis')->name('digital-footprint-analysis');
        Route::view('/credit-score-and-bankruptcy-checks', 'pages.features.user-screening.credit-score-bankruptcy')->name('credit-score-bankruptcy');
        Route::view('/aml-cft-screening', 'pages.features.user-screening.aml-cft-screening')->name('aml-cft-screening');
        Route::view('/face-recognition-search', 'pages.features.user-screening.face-recognition-search')->name('face-recognition-search');
    });

    Route::prefix('additional-verification')->name('additional-verification.')->group(function () {
        Route::view('/', 'pages.features.additional-verification.index')->name('index');
        Route::view('/income-and-address-proofing', 'pages.features.additional-verification.income-address-proofing')->name('income-address-proofing');
        Route::view('/device-binding-and-intelligence', 'pages.features.additional-verification.device-binding-intelligence')->name('device-binding-intelligence');
        Route::view('/digital-signatures', 'pages.features.additional-verification.digital-signatures')->name('digital-signatures');
        Route::view('/deepfake-and-injection-attack-detection', 'pages.features.additional-verification.deepfake-detection')->name('deepfake-detection');
    });
});

// Solutions
Route::prefix('solutions')->name('solutions.')->group(function () {
    Route::view('/', 'pages.solutions.index')->name('index');
    Route::view('/ekyc-for-developers', 'pages.solutions.developers')->name('developers');
    Route::view('/ekyc-for-sme-corporations', 'pages.solutions.sme-corporations')->name('sme-corporations');

    // Country Solutions
    Route::prefix('landing-pages')->name('landing.')->group(function () {
        Route::view('/ekyc-malaysia', 'pages.solutions.landing.ekyc-malaysia')->name('ekyc-malaysia');
        Route::view('/ekyc-singapore', 'pages.solutions.landing.ekyc-singapore')->name('ekyc-singapore');
        Route::view('/ekyc-philippines', 'pages.solutions.landing.ekyc-philippines')->name('ekyc-philippines');
        Route::view('/ekyc-vietnam', 'pages.solutions.landing.ekyc-vietnam')->name('ekyc-vietnam');
        Route::view('/ekyc-myanmar', 'pages.solutions.landing.ekyc-myanmar')->name('ekyc-myanmar');
        Route::view('/ekyc-indonesia', 'pages.solutions.landing.ekyc-indonesia')->name('ekyc-indonesia');
        Route::view('/ekyc-cambodia', 'pages.solutions.landing.ekyc-cambodia')->name('ekyc-cambodia');
        Route::view('/ekyc-brunei', 'pages.solutions.landing.ekyc-brunei')->name('ekyc-brunei');
        Route::view('/ekyc-hong-kong', 'pages.solutions.landing.ekyc-hong-kong')->name('ekyc-hong-kong');
        Route::view('/ekyc-kenya', 'pages.solutions.landing.ekyc-kenya')->name('ekyc-kenya');
        Route::view('/ekyc-components-for-indonesia', 'pages.solutions.landing.ekyc-components-indonesia')->name('ekyc-components-indonesia');
    });

    // Industry Solutions
    Route::prefix('landing-pages')->name('landing.')->group(function () {
        Route::view('/ekyc-for-insurance-industry', 'pages.solutions.landing.insurance-industry')->name('insurance-industry');
        Route::view('/ekyc-for-insurance-industry-in-malaysia', 'pages.solutions.landing.insurance-malaysia')->name('insurance-malaysia');
        Route::view('/ekyc-for-insurance-industry-in-indonesia', 'pages.solutions.landing.insurance-indonesia')->name('insurance-indonesia');
        Route::view('/ekyc-for-insurance-industry-in-thailand', 'pages.solutions.landing.insurance-thailand')->name('insurance-thailand');
        Route::view('/ekyc-for-insurance-industry-in-cambodia', 'pages.solutions.landing.insurance-cambodia')->name('insurance-cambodia');
        Route::view('/ekyc-for-insurance-industry-in-the-phillipines', 'pages.solutions.landing.insurance-philippines')->name('insurance-philippines');
        Route::view('/ekyc-for-credit-financing-industry', 'pages.solutions.landing.credit-financing')->name('credit-financing');
        Route::view('/ekyc-for-ehealthcare-industry', 'pages.solutions.landing.ehealthcare')->name('ehealthcare');
        Route::view('/id-assurance-for-hospitality-industry', 'pages.solutions.landing.hospitality')->name('hospitality');
    });

    // Whitepapers & Reports
    Route::prefix('landing-pages')->name('landing.')->group(function () {
        Route::view('/secure-digital-identity-for-government-services-in-malaysia', 'pages.solutions.landing.government-malaysia')->name('government-malaysia');
        Route::view('/innov8tif-fraud-report', 'pages.solutions.landing.fraud-report')->name('fraud-report');
        Route::view('/joget-low-code-development', 'pages.solutions.landing.joget-low-code')->name('joget-low-code');
        Route::view('/philippines-telco-whitepaper', 'pages.solutions.landing.philippines-telco')->name('philippines-telco');
        Route::view('/bnpl-use-case-document', 'pages.solutions.landing.bnpl-use-case')->name('bnpl-use-case');
        Route::view('/cambodia-banking-whitepaper', 'pages.solutions.landing.cambodia-banking')->name('cambodia-banking');
        Route::view('/emas-ekyc-api-ondemand', 'pages.solutions.landing.ekyc-api-ondemand')->name('ekyc-api-ondemand');
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

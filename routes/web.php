<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::view('/', 'pages.home');

// About, Contact & Careers
Route::view('/about', 'pages.about');
Route::view('/contact', 'pages.contact');
Route::post('/contact', [ContactController::class, 'store']);
Route::view('/careers', 'pages.careers');

// Features & Components
Route::view('/features-and-components', 'pages.features.index');
Route::view('/features-and-components/identity-verification', 'pages.features.identity-verification.index');
Route::view('/features-and-components/identity-verification/facial-matching', 'pages.features.identity-verification.facial-matching');
Route::view('/features-and-components/identity-verification/remote-and-video-verification', 'pages.features.identity-verification.remote-video-verification');
Route::view('/features-and-components/identity-verification/id-data-extraction', 'pages.features.identity-verification.id-data-extraction');
Route::view('/features-and-components/identity-verification/id-verification', 'pages.features.identity-verification.id-verification');
Route::view('/features-and-components/identity-verification/liveness-detection', 'pages.features.identity-verification.liveness-detection');

Route::view('/features-and-components/user-screening', 'pages.features.user-screening.index');
Route::view('/features-and-components/user-screening/digital-footprint-analysis', 'pages.features.user-screening.digital-footprint-analysis');
Route::view('/features-and-components/user-screening/credit-score-and-bankruptcy-checks', 'pages.features.user-screening.credit-score-bankruptcy');
Route::view('/features-and-components/user-screening/aml-cft-screening', 'pages.features.user-screening.aml-cft-screening');
Route::view('/features-and-components/user-screening/face-recognition-search', 'pages.features.user-screening.face-recognition-search');

Route::view('/features-and-components/additional-verification', 'pages.features.additional-verification.index');
Route::view('/features-and-components/additional-verification/income-and-address-proofing', 'pages.features.additional-verification.income-address-proofing');
Route::view('/features-and-components/additional-verification/device-binding-and-intelligence', 'pages.features.additional-verification.device-binding-intelligence');
Route::view('/features-and-components/additional-verification/digital-signatures', 'pages.features.additional-verification.digital-signatures');
Route::view('/features-and-components/additional-verification/deepfake-and-injection-attack-detection', 'pages.features.additional-verification.deepfake-detection');

// Solutions
Route::view('/solutions', 'pages.solutions.index');
Route::view('/solutions/ekyc-for-developers', 'pages.solutions.developers');
Route::view('/solutions/ekyc-for-sme-corporations', 'pages.solutions.sme-corporations');

// Solution Landing Pages
Route::view('/solutions/landing-pages/ekyc-malaysia', 'pages.solutions.landing.ekyc-malaysia');
Route::view('/solutions/landing-pages/ekyc-singapore', 'pages.solutions.landing.ekyc-singapore');
Route::view('/solutions/landing-pages/ekyc-philippines', 'pages.solutions.landing.ekyc-philippines');
Route::view('/solutions/landing-pages/ekyc-vietnam', 'pages.solutions.landing.ekyc-vietnam');
Route::view('/solutions/landing-pages/ekyc-myanmar', 'pages.solutions.landing.ekyc-myanmar');
Route::view('/solutions/landing-pages/ekyc-indonesia', 'pages.solutions.landing.ekyc-indonesia');
Route::view('/solutions/landing-pages/ekyc-cambodia', 'pages.solutions.landing.ekyc-cambodia');
Route::view('/solutions/landing-pages/ekyc-brunei', 'pages.solutions.landing.ekyc-brunei');
Route::view('/solutions/landing-pages/ekyc-hong-kong', 'pages.solutions.landing.ekyc-hong-kong');
Route::view('/solutions/landing-pages/ekyc-kenya', 'pages.solutions.landing.ekyc-kenya');
Route::view('/solutions/landing-pages/ekyc-components-for-indonesia', 'pages.solutions.landing.ekyc-components-indonesia');
Route::view('/solutions/landing-pages/id-assurance-for-hospitality-industry', 'pages.solutions.landing.hospitality');
Route::view('/solutions/landing-pages/secure-digital-identity-for-government-services-in-malaysia', 'pages.solutions.landing.government-malaysia');
Route::view('/solutions/landing-pages/innov8tif-fraud-report', 'pages.solutions.landing.fraud-report');
Route::view('/solutions/landing-pages/joget-low-code-development', 'pages.solutions.landing.joget-low-code');
Route::view('/solutions/landing-pages/philippines-telco-whitepaper', 'pages.solutions.landing.philippines-telco');

// Industry Solution Pages
Route::view('/solutions/landing-pages/ekyc-for-insurance-industry', 'pages.solutions.landing.insurance-industry');
Route::view('/solutions/landing-pages/ekyc-for-insurance-industry-in-malaysia', 'pages.solutions.landing.insurance-malaysia');
Route::view('/solutions/landing-pages/ekyc-for-insurance-industry-in-indonesia', 'pages.solutions.landing.insurance-indonesia');
Route::view('/solutions/landing-pages/ekyc-for-insurance-industry-in-thailand', 'pages.solutions.landing.insurance-thailand');
Route::view('/solutions/landing-pages/ekyc-for-insurance-industry-in-cambodia', 'pages.solutions.landing.insurance-cambodia');
Route::view('/solutions/landing-pages/ekyc-for-insurance-industry-in-the-phillipines', 'pages.solutions.landing.insurance-philippines');
Route::view('/solutions/landing-pages/ekyc-for-credit-financing-industry', 'pages.solutions.landing.credit-financing');
Route::view('/solutions/landing-pages/ekyc-for-ehealthcare-industry', 'pages.solutions.landing.ehealthcare');

// Whitepaper/Document Pages
Route::view('/solutions/landing-pages/bnpl-use-case-document', 'pages.solutions.landing.bnpl-use-case');
Route::view('/solutions/landing-pages/cambodia-banking-whitepaper', 'pages.solutions.landing.cambodia-banking');
Route::view('/solutions/landing-pages/emas-ekyc-api-ondemand', 'pages.solutions.landing.ekyc-api-ondemand');

// Resources
Route::view('/resources', 'pages.resources.index');
Route::view('/resources/privacy-policy', 'pages.resources.privacy-policy');
Route::view('/resources/events', 'pages.resources.events');
Route::view('/resources/guides-reports', 'pages.resources.guides-reports');

// Knowledge Hub (DB-backed)
Route::get('/resources/knowledge-hub', [PostController::class, 'index']);
Route::get('/resources/knowledge-hub/{post:slug}', [PostController::class, 'show']);

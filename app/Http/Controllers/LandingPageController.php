<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLandingPageLeadRequest;
use App\Models\LandingPage;
use App\Services\LeadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function show(LandingPage $landingPage): View
    {
        return view('pages.landing.show', ['page' => $landingPage]);
    }

    public function submit(StoreLandingPageLeadRequest $request, LandingPage $landingPage, LeadService $leadService): JsonResponse|RedirectResponse
    {
        $validated = $request->validated();

        if ($request->filled('website')) {
            return $this->successResponse($landingPage, $request);
        }

        $leadService->captureOrUpdate(
            data: [
                'email' => $validated['email'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'] ?? null,
                'phone' => $validated['phone'] ?? null,
                'company' => $validated['company'] ?? null,
            ],
            activity: [
                'type' => 'form_submission',
                'landing_page_id' => $landingPage->id,
                'metadata' => array_filter([
                    'lead_source' => $validated['lead_source'] ?? $landingPage->slug,
                    'utm_source' => $validated['utm_source'] ?? null,
                    'utm_medium' => $validated['utm_medium'] ?? null,
                    'utm_campaign' => $validated['utm_campaign'] ?? null,
                    'page_title' => $landingPage->title,
                ]),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]
        );

        session()->put("lead_submitted.{$landingPage->id}", true);

        return $this->successResponse($landingPage, $request);
    }

    public function thankYou(LandingPage $landingPage): View
    {
        $config = $landingPage->form_config['thank_you'] ?? [];
        $pdfUrl = null;

        if ($landingPage->hasPdf() && session("lead_submitted.{$landingPage->id}")) {
            $pdfUrl = $landingPage->getFirstMediaUrl('pdfs');
        }

        return view('pages.landing.thank-you', [
            'page' => $landingPage,
            'thankYouConfig' => $config,
            'showPdfDownload' => data_get($config, 'show_pdf_download', false),
            'pdfUrl' => $pdfUrl,
            'ctaText' => data_get($config, 'cta_text'),
            'ctaUrl' => data_get($config, 'cta_url'),
        ]);
    }

    private function successResponse(LandingPage $landingPage, StoreLandingPageLeadRequest $request): JsonResponse|RedirectResponse
    {
        $thankYouUrl = route('solutions.landing.thank-you', $landingPage->slug);

        if ($request->expectsJson()) {
            return response()->json(['redirect' => $thankYouUrl]);
        }

        return redirect($thankYouUrl);
    }
}

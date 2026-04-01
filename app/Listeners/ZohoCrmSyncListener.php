<?php

namespace App\Listeners;

use App\Events\LeadCaptured;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ZohoCrmSyncListener implements ShouldQueue
{
    public int $tries = 3;

    public int $backoff = 60;

    public function handle(LeadCaptured $event): void
    {
        if (! config('services.zoho.enabled', false)) {
            return;
        }

        $lead = $event->lead;
        $activity = $event->activity;

        try {
            $accessToken = $this->getAccessToken();

            $response = Http::withToken($accessToken)
                ->post(config('services.zoho.api_url').'/crm/v5/Leads/upsert', [
                    'data' => [
                        [
                            'Email' => $lead->email,
                            'First_Name' => $lead->first_name,
                            'Last_Name' => $lead->last_name ?: '(Not provided)',
                            'Phone' => $lead->phone,
                            'Company' => $lead->company ?: '(Not provided)',
                            'Lead_Source' => $this->mapSource($activity->type),
                            'Description' => $this->buildDescription($activity),
                        ],
                    ],
                    'duplicate_check_fields' => ['Email'],
                ]);

            if ($response->failed()) {
                Log::error('Zoho CRM sync failed', [
                    'lead_id' => $lead->id,
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('Zoho CRM sync exception', [
                'lead_id' => $lead->id,
                'message' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    private function getAccessToken(): string
    {
        return Cache::remember('zoho_access_token', 3500, function () {
            $response = Http::asForm()->post(config('services.zoho.accounts_url').'/oauth/v2/token', [
                'grant_type' => 'refresh_token',
                'client_id' => config('services.zoho.client_id'),
                'client_secret' => config('services.zoho.client_secret'),
                'refresh_token' => config('services.zoho.refresh_token'),
            ]);

            throw_if(! $response->successful(), \RuntimeException::class, 'Failed to obtain Zoho access token: '.$response->body());

            return $response->json('access_token');
        });
    }

    private function mapSource(string $activityType): string
    {
        return match ($activityType) {
            'form_submission' => 'Landing Page',
            'contact_form' => 'Website Contact Form',
            default => 'Website',
        };
    }

    private function buildDescription(mixed $activity): string
    {
        $parts = ["Source: {$activity->type}"];

        if ($activity->landingPage) {
            $parts[] = "Page: {$activity->landingPage->title}";
        }

        $metadata = $activity->metadata ?? [];
        if (! empty($metadata['utm_source'])) {
            $parts[] = "UTM Source: {$metadata['utm_source']}";
        }
        if (! empty($metadata['utm_campaign'])) {
            $parts[] = "UTM Campaign: {$metadata['utm_campaign']}";
        }

        return implode("\n", $parts);
    }
}

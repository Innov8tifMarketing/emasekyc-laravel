<?php

namespace App\Services;

use App\Events\LeadCaptured;
use App\Models\Lead;
use Illuminate\Support\Arr;

class LeadService
{
    /**
     * @param  array{email: string, first_name?: string, last_name?: string, phone?: string, company?: string}  $data
     * @param  array{type: string, landing_page_id?: int, metadata?: array, ip_address?: string, user_agent?: string}  $activity
     */
    public function captureOrUpdate(array $data, array $activity): Lead
    {
        $lead = Lead::firstOrCreate(
            ['email' => $data['email']],
            ['original_source' => $activity['type'] === 'contact_form' ? 'contact_form' : 'landing_page']
        );

        $updatable = array_filter(
            Arr::only($data, ['first_name', 'last_name', 'phone', 'company']),
            fn ($value) => $value !== null && $value !== ''
        );

        if ($updatable) {
            $lead->update($updatable);
        }

        $leadActivity = $lead->activities()->create($activity);

        LeadCaptured::dispatch($lead, $leadActivity);

        return $lead;
    }
}

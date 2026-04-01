<?php

namespace App\Events;

use App\Models\Lead;
use App\Models\LeadActivity;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LeadCaptured
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public Lead $lead,
        public LeadActivity $activity,
    ) {}
}

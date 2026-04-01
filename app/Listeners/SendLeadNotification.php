<?php

namespace App\Listeners;

use App\Events\LeadCaptured;
use App\Mail\LeadNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendLeadNotification implements ShouldQueue
{
    public function handle(LeadCaptured $event): void
    {
        $recipients = config('services.lead_notifications.recipients', [
            'sales@innov8tif.com',
            'marketing@innov8tif.com',
        ]);

        Mail::to($recipients)->send(new LeadNotificationMail($event->lead, $event->activity));
    }
}

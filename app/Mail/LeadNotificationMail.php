<?php

namespace App\Mail;

use App\Models\Lead;
use App\Models\LeadActivity;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Lead $lead,
        public LeadActivity $activity,
    ) {}

    public function envelope(): Envelope
    {
        $source = $this->activity->landingPage?->title ?? ucfirst(str_replace('_', ' ', $this->activity->type));

        return new Envelope(
            subject: "New Lead: {$this->lead->email} — {$source}",
            replyTo: [$this->lead->email],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.lead-notification',
        );
    }
}

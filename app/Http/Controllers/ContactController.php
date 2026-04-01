<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactFormMail;
use App\Services\LeadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request, LeadService $leadService)
    {
        if ($request->filled('website')) {
            return back()->with('success', 'Thank you for your message. Our team will get back to you shortly.');
        }

        $validated = $request->validated();

        Mail::to(config('mail.from.address', 'info@cothink.ing'))
            ->queue(new ContactFormMail($validated));

        $leadService->captureOrUpdate(
            data: [
                'email' => $validated['work_email'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'phone' => $validated['phone'] ?? null,
                'company' => $validated['company_name'] ?? null,
            ],
            activity: [
                'type' => 'contact_form',
                'metadata' => [
                    'inquiry_type' => $validated['inquiry_type'],
                    'message' => $validated['message'],
                ],
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]
        );

        return back()->with('success', 'Thank you for your message. Our team will get back to you shortly.');
    }

    public function quickStore(Request $request, LeadService $leadService)
    {
        if ($request->filled('website')) {
            return response()->json(['message' => 'Thank you! We\'ll be in touch shortly.']);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $data = [
            'first_name' => $validated['name'],
            'last_name' => '',
            'work_email' => $validated['email'],
            'phone' => null,
            'company_name' => null,
            'inquiry_type' => 'quick-contact',
            'message' => $validated['message'],
        ];

        Mail::to(config('mail.from.address', 'info@cothink.ing'))
            ->queue(new ContactFormMail($data));

        $leadService->captureOrUpdate(
            data: [
                'email' => $validated['email'],
                'first_name' => $validated['name'],
            ],
            activity: [
                'type' => 'contact_form',
                'metadata' => ['message' => $validated['message']],
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]
        );

        return response()->json(['message' => 'Thank you! We\'ll be in touch shortly.']);
    }
}

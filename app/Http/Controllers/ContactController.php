<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        if ($request->filled('website')) {
            return back()->with('success', 'Thank you for your message. Our team will get back to you shortly.');
        }

        Mail::to(config('mail.from.address', 'info@cothink.ing'))
            ->queue(new ContactFormMail($request->validated()));

        return back()->with('success', 'Thank you for your message. Our team will get back to you shortly.');
    }

    public function quickStore(Request $request)
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

        return response()->json(['message' => 'Thank you! We\'ll be in touch shortly.']);
    }
}

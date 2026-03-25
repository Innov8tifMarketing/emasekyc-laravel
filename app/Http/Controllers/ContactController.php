<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'inquiry_type' => 'required|string|in:demo,pricing,support,careers,media',
            'message' => 'required|string|max:5000',
        ]);

        Mail::to(config('mail.from.address', 'info@cothink.ing'))
            ->send(new ContactFormMail($validated));

        return back()->with('success', 'Thank you for your message. Our team will get back to you shortly.');
    }
}

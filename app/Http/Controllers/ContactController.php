<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactFormMail;
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
}

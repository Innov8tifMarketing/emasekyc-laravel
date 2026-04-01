<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        if ($request->filled('website')) {
            return response()->json(['message' => 'Subscribed successfully.']);
        }

        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        NewsletterSubscriber::firstOrCreate(
            ['email' => $validated['email']],
            [
                'ip_hash' => hash('sha256', $request->ip()),
                'source' => $request->input('source', 'footer'),
            ]
        );

        return response()->json(['message' => 'Subscribed successfully.']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Show the contact form
    public function create()
    {
        return view('contact.form');
    }

    // Handle contact form submission
    public function store(Request $request)
    {
        // Validate form input
        $data = $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Save message in the database
        $message = ContactMessage::create($data);

        // Send email to admin
        Mail::to('admin@ehb.be')->send(
            new ContactFormSubmitted($message)
        );

        return redirect()
    ->route('contact.show')
    ->with('success', 'Your message has been sent successfully.');
    }
}

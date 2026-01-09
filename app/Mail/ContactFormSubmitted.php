<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    // Holds the contact message data
    public ContactMessage $messageModel;

    // Receive the contact message model
    public function __construct(ContactMessage $messageModel)
    {
        $this->messageModel = $messageModel;
    }

    // Set the email subject
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nieuw contactformulier bericht',
        );
    }

    // Define which email view is used
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }
}

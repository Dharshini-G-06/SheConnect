<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SosMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $location;
    public $messageText;

    public function __construct($student, $location, $messageText)
    {
        $this->student = $student;
        $this->location = $location;
        $this->messageText = $messageText;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🚨 Emergency SOS Alert',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.sos',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendToAllUsers extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $messageBody;

    public function __construct($title, $messageBody)
    {
        $this->title = $title;
        $this->messageBody = $messageBody;
    }

    public function envelope()
    {
        return new Envelope(
            subject: $this->title, // The email subject will be the title
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.sendToAllUsers', // View file for the email content
        );
    }

    public function attachments()
    {
        return [];
    }
}

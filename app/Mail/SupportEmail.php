<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SupportEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $message;
    public $subject;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $mgs, $sub)
    {
        $this->user = $user;
        $this->message = $mgs;
        $this->subject = $sub;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.index',
            with: [
                'user' => $this->user,
                'subject' => $this->subject,
                'messageContent' => $this->message,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

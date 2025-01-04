<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationSuccessEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $subject;
    public $userid;
    public $password;
    public $token;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $sub, $id, $pass, $token)
    {
        $this->user = $user;
        $this->subject = $sub;
        $this->userid = $id;
        $this->password = $pass;
        $this->token = $token;
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
        $verificationUrl = route('verify', ['token' => $this->token]);
        return new Content(
            view: 'mail.registration',
            with: [
                'user' => $this->user,
                'subject' => $this->subject,
                'userid' => $this->userid,
                'password' => $this->password,
                'url' => $verificationUrl,
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

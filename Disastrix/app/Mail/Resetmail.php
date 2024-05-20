<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Resetmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The reset link for the email.
     *
     * @var string
     */
    public string $resetlink;

    /**
     * Create a new message instance.
     *
     * @param string $resetlink
     * @return void
     */
    public function __construct(string $resetlink)
    {
        $this->resetlink = $resetlink;
    }

    /**
     * Get the message envelope.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Password reset',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'auth.reset-password',
            with: ['resetlink' => $this->resetlink],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
}

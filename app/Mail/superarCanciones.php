<?php

namespace App\Mail;

use App\Models\Album;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class superarCanciones extends Mailable
{
    use Queueable, SerializesModels;

    public $canciones;
    public $album;

    /**
     * Create a new message instance.
     */
    public function __construct($canciones, Album $album)
    {
        $this->canciones = $canciones;
        $this->album = $album;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Superar Canciones',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.superar-canciones',
            text: 'emails.superar-canciones-text',
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

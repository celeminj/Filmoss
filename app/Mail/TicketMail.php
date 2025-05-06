<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable
{
    use Queueable, SerializesModels;
    public $nombre;
    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $titulo,$image,$descripcion,$hora)
    {
        $this->nombre = $nombre;
        $this->titulo = $titulo;
        $this->image = $image;
        $this->descripcion = $descripcion;
        $this->hora = $hora;
    }

    public function build()
    {
        return $this->subject('Tu entrada de la película')
                    ->view('emails.ticket')
                    ->with([
                        'nombre' => $this->nombre,
                        'titulo' => $this->titulo,
                        'image' => $this->image,
                        'descripcion' => $this->descripcion,
                        'hora' => $this->hora,
                    ]);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ticket Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.ticket',
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

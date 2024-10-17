<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SaranEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $saran;

    /**
     * Create a new message instance.
     */
    public function __construct($saran)
    {
        $this->saran = $saran;
    }

    public function build()
    {
        return $this->from($this->saran['email'])
                    ->subject('Saran dari ' . $this->saran['name'])
                    ->view('frontend.layouts.saran')
                    ->with('saran', $this->saran);
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

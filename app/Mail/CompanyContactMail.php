<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompanyContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $companyData;
    /**
     * Create a new message instance.
     */
    public function __construct($companyData)
    {
        $this->companyData = $companyData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope();
    }

    /**
     * Get the message content definition.
     */
    
     public function build()
     {
         return $this->view('email');
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

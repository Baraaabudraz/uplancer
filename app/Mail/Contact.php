<?php

namespace App\Mail;

use Faker\Provider\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    public $email;
    public $topic;

    public $message;


    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $topic, $message)
    {
        $this->name    = $name;
        $this->email   = $email;
        $this->topic   = $topic;
        $this->message = $message;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Request',
            replyTo: [
                new Address($this->email),
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.contact',
            with: [
                'name'=>$this->name,
                'email'=>$this->email,
                'topic'=>$this->topic,
                'message'=>$this->message,
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

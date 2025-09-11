<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Booking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Booking $booking,
        public string $messageBody,
        public string $status // 'accepted' or 'declined'
    ) {}


    public function build()
    {
        $subject = $this->status === 'accepted'
            ? 'Your Zeeva Nails appointment is confirmed'
            : 'Update about your Zeeva Nails appointment';

        return $this->subject($subject)
            ->markdown('emails.booking.status', [
                'booking' => $this->booking,
                'messageBody' => $this->messageBody,
                'status' => $this->status,
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Status Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.booking.status',
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

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Booking;


class validasi extends Mailable
{
    
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $booking;
    public $pdfHtml;
    public $users;
    public $user;

    public function __construct(Booking $booking, $users, $user, $pdfHtml) {
        $this->booking = $booking;
        $this->pdfHtml = $pdfHtml;
        $this->users = $users;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('customer.invoicebuatan')
                    // attach the pdf to email
                    ->attachData($this->pdfHtml, 'name.pdf', [
                        'mime' => 'application/pdf',
                    ]);;
    }
}

<?php

namespace App\Mail;

use App\Models\Companies;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewCompanyNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $company;
    /**
     * Create a new message instance.
     */
    public function __construct(Companies $company)
    {
        $this->company = $company;
        $this->build();
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Company Successfully Created')
            ->view('emails.new-company-notification');
    }
}

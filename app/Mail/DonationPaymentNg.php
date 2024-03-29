<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonationPaymentNg extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public function __construct($order)
    {
        $this->order = $order;
    }
    /**
     * Build the message.
     *
     * @return $thisjoin_volunteer
     */
    public function build()
    {
        return $this
        ->subject('NVDC NG Donation')
        ->markdown('mails.donation_ng');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JktMailAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $customer;
    public $pollResults;
    public $total;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($customer,$pollResults, $total)
     {
         $this->customer = $customer;
         $this->pollResults = $pollResults;
         $this->total = $total;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Ваш Индекс тяжести ЖКТ с сайта eat.coach')->view('email.poll.jktAdmin');
    }
}

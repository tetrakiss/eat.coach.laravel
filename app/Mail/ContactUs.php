<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $phone;
    public $customerMessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$phone,$customerMessage)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->customerMessage = $customerMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Кто то заполнил форму обратной связи на сайте eat.coach')->view('email.forms.contact');
    }
}

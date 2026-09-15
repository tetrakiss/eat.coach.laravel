<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConsultationRequest extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $phone;
    public $date;
    public $customerMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$phone,$date,$customerMessage)
    {
      $this->name = $name;
      $this->email = $email;
      $this->phone = $phone;
      $this->date = $date;
      $this->customerMessage = $customerMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Запрос на коснультацию с сайта eat.coach')->view('email.forms.consultationRequest');
    }
}

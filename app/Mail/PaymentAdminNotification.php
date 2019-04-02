<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentAdminNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $yandexData;


    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($yandexData)
     {
         $this->yandexData = $yandexData;

     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
          return $this->subject('Уведомление об оплате eat.coach')->view('email.yandex.adminNotify');
    }
}

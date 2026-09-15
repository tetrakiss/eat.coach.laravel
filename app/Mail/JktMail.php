<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JktMail extends Mailable
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


    /*public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $zapor;
    public $diarea;
    public $konsisten;
    public $zapah;
    public $meteor;
    public $bol;
    public $rage;
    public $feel;
    public $total;*/

    /**
     * Create a new message instance.
     *
     * @return void
     */
    /*public function __construct($first_name,$last_name,$phone,$email,$zapor, $diarea, $konsisten, $zapah, $meteor, $bol, $rage, $feel, $total)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->zapor = $zapor;
        $this->diarea = $diarea;
        $this->konsisten = $konsisten;
        $this->zapah = $zapah;
        $this->meteor = $meteor;
        $this->bol = $bol;
        $this->rage = $rage;
        $this->feel = $feel;
        $this->total = $total;

    }*/


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Ваш Индекс тяжести ЖКТ с сайта eat.coach')->view('email.poll.jktCustomer');
    }
}

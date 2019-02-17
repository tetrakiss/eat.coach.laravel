<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YandexCheckout\Client;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Cookie;

class YandexController extends Controller
{

    public function create () {
      $idempotenceKey = uniqid('', true);
      session(['pay_id' => $idempotenceKey]);


      $client = new Client();
      $client->setAuth(env('YANDEX_KASSA_SHOPID'), env('YANDEX_KASSA_SECRET'));

    $response = $client->createPayment(
        array(
            "amount" => array(
                "value" => "4000.00",
                "currency" => "RUB"
            ),
            'capture' => true,
            'description' => 'Оплата консультации Иванов Иван',
            "confirmation" => array(
                "type" => "redirect",
                "return_url" => "https://eat.coach/yandex/success"
            ),
            "receipt" => array(

                "email" => "togulev@gmail.com",
                "items" => array(
                  array(
                      "description" => "Консультация",
                      "quantity" => "1.00",
                      "amount" => array(
                          "value" => "4000.00",
                          "currency" => "RUB"
                      ),
                      "vat_code" => "1",
                      "payment_mode" => "full_prepayment",
                      "payment_subject" => "service",
                      "tax_system_code"=>"2",
                  )
                )
            )
        ),
        $idempotenceKey
    );
      session(['pay_id' => $response->id]);
    //редирект на платежный шлюз
      return redirect($response->confirmation->confirmationUrl);

    }

    public function callback(Request $request){
    Log::info('Get data from Kassa');
    $req_dump=$request->all();

    Log::info($req_dump);
    /*  $fp = fopen('request.log', 'a');
      fwrite($fp, $req_dump);
      fclose($fp);*/
    }
    public function success () {

      $paymentId = session('pay_id');
      $client = new Client();
      $payment = $client->getPaymentInfo($paymentId);
      session()->forget('pay_id');
      dd($payment);
      echo "Платеж оплачен!";
    }
}

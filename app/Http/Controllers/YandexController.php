<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YandexCheckout\Client;
use Illuminate\Support\Facades\Log;

class YandexController extends Controller
{

    public function create () {
      $idempotenceKey = uniqid('', true);
      $client = new Client();
      $client->setAuth(env('YANDEX_KASSA_SHOPID'), env('YANDEX_KASSA_SECRET'));


      /*$response = $client->createPayment(
          array(
              'amount' => array(
                  'value' => '2.00',
                  'currency' => 'RUB',
              ),
              'payment_method_data' => array(
                  'type' => 'bank_card',
              ),
              'confirmation' => array(
                  'type' => 'redirect',
                  'return_url' => 'https://eat.coach/yandex/success',
              ),
              'capture' => true,
              'description' => 'Заказ №72',
          ),
          $idempotenceKey
      );*/

    $response = $client->createPayment(
        array(
            "amount" => array(
                "value" => "4000.00",
                "currency" => "RUB"
            ),
            "confirmation" => array(
                "type" => "redirect",
                "return_url" => "https://eat.coach/yandex/success"
            ),
            "receipt" => array(

                "phone" => "79000000000",
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
        uniqid('', true)
    );
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
      echo "Платеж оплачен!";
    }
}

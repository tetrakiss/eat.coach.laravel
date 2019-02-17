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


      $response = $client->createPayment(
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
              'description' => 'Заказ №72',
          ),
          $idempotenceKey
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

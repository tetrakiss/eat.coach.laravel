<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YandexCheckout\Client;

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
                  'return_url' => env('YANDEX_KASSA_CALLBACK'),
              ),
              'description' => 'Заказ №72',
          ),
          $idempotenceKey
      );
      redirect($response->confirmation->confirmationUrl);
      //dd($response);
    }

    public function callback(Request $request){
      dd($request->all());
    }
}

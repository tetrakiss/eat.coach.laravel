<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YandexCheckout\Client;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Cookie;
use DB;
class YandexController extends Controller
{

    public function create($type) {
      $consultation= DB::table('consultation')->where('id', $type)->first();
      return view('products.consultation.create')->with('consultation',$consultation);
    }

    public function store (Request $request) {

      $consultation= DB::table('consultation')->where('id', $request->type)->first();

      $idempotenceKey = uniqid('', true);

      $client = new Client();
      $client->setAuth(env('YANDEX_KASSA_SHOPID'), env('YANDEX_KASSA_SECRET'));

      $response = $client->createPayment(
          array(
              "amount" => array(
                  "value" => $consultation->price,
                  "currency" => "RUB"
              ),
              'capture' => true,
              'description' => 'Оплата консультации '.$request->first_name.' '.$request->last_name,
              "confirmation" => array(
                  "type" => "redirect",
                  "return_url" => "https://eat.coach/yandex/success"
              ),
              "receipt" => array(

                  "email" => "togulev@gmail.com",
                  "items" => array(
                    array(
                        'description' => 'Оплата консультации '.$request->first_name.' '.$request->last_name,
                        "quantity" => "1.00",
                        "amount" => array(
                            "value" => $consultation->price,
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
      DB::table('consultation_payment')->insert(
          ['yandex_id' => $response->id,
           'consultation_id' => $consultation->id,
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'email' => $request->email,
           'phone' => $request->phone,
           'description' => 'Оплата консультации '.$request->first_name.' '.$request->last_name,
           'amount' => $consultation->price,
           'status' => 'waiting_for_capture'
          ]
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

      $paymentId = session('pay_id');
      $consultation_payment= DB::table('consultation_payment')->where('yandex_id', $paymentId)->first();

      $client = new Client();
      $client->setAuth(env('YANDEX_KASSA_SHOPID'), env('YANDEX_KASSA_SECRET'));
      $payment = $client->getPaymentInfo($paymentId);
      session()->forget('pay_id');
      if(!empty($consultation_payment)){
      DB::table('consultation_payment')
            ->where('yandex_id', $paymentId)
            ->update(['status' => $payment->status]);
        if($payment->status =='succeeded'){
            echo "Платеж оплачен!";
        }else {
            echo "Платеж не оплачен!";
        }
      }else {

          echo "Что то пошло нетак!";
      }

      //dd($payment);

      //$payment->status =='succeeded'
    }
    public function consultation () {
      return view('products.consultation.index');
    }
}

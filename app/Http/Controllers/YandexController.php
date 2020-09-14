<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YandexCheckout\Client;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Cookie;
use DB;
use App\Http\Requests\ConsultationRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentAdminNotification;

class YandexController extends Controller
{

    public function create($type) {
      $consultation= DB::table('consultation')->where('id', $type)->first();
      return view('products.consultation.create')->with('consultation',$consultation);
    }

    public function store (ConsultationRequest $request) {

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
              'description' =>'Оплата консультации '.$request->first_name.' '.$request->last_name,
              "confirmation" => array(
                  "type" => "redirect",
                  "return_url" => "https://eat.coach/yandex/success"
              ),
              "receipt" => array(

                  "email" => $request->email,
                  "items" => array(
                    array(
                        'description' => $consultation->title,
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
           'status' => 'waiting_for_capture',
           'created_at' => now(),
           'updated_at' => now()
          ]
      );
    //редирект на платежный шлюз
      return redirect($response->confirmation->confirmationUrl);

    }
    public function mtest() {

      $yandexData=(object)[
        'id' =>  1,
        'status' => "оплачен",
        'amout' =>   1000,
        'description' => "Описание"
      ];
        Mail::to('v.toguleva@gmail.com')->send(new PaymentAdminNotification($yandexData));
      //Storage::disk('local')->put('yandexCallback.log', print_r(json_decode(file_get_contents("php://input")), true));

      }

    public function getPaymentStatus(){
      $client = new Client();
      $client->setAuth(env('YANDEX_KASSA_SHOPID'), env('YANDEX_KASSA_SECRET'));
      $consultation_payments= DB::table('consultation_payment')->where('status','waiting_for_capture')->orderBy('updated_at', 'desc')->get();
      if(!empty($consultation_payments)){
        foreach ($consultation_payments as $p) {
            $paymentId = $p->yandex_id;
            
            $payment = $client->getPaymentInfo($paymentId);
            DB::table('consultation_payment')
                  ->where('yandex_id', $payment->id)
                  ->update(['status' => $payment->status,'updated_at' => now()]);
            }
            echo $paymentId."<br>";
        }


    }

    public function callback(Request $request){
    $rawData=json_decode(file_get_contents("php://input"));
    $yandex_id= $rawData->object->id;
    $status =  $rawData->object->status;
    $amout = $rawData->object->amount->value;
    $description="";
    $consultation_payment= DB::table('consultation_payment')->where('yandex_id',$yandex_id)->first();
    if(!empty($consultation_payment)){
      $description=$consultation_payment->phone." ".$consultation_payment->first_name." ".$consultation_payment->last_name;
      DB::table('consultation_payment')
            ->where('yandex_id', $yandex_id)
            ->update(['status' => $status,'updated_at' => now()]);
    }
    $yandexData=(object)[
      'id' =>  $yandex_id,
      'status' => $status,
      'amout' =>   $amout,
      'description' => $description
    ];
      Mail::to('valentina.toguleva@gmail.com')->send(new PaymentAdminNotification($yandexData));
    //Storage::disk('local')->put('yandexCallback.log', print_r(json_decode(file_get_contents("php://input")), true));

    }
    public function success () {

      $paymentId = session('pay_id');
      $consultation_payment= DB::table('consultation_payment')->where('yandex_id', $paymentId)->first();

      $client = new Client();
      $client->setAuth(env('YANDEX_KASSA_SHOPID'), env('YANDEX_KASSA_SECRET'));
      $payment = $client->getPaymentInfo($paymentId);
      session()->forget('pay_id');
      if(!empty($consultation_payment)){
        if($consultation_payment->status != 'succeeded'){
          DB::table('consultation_payment')
                ->where('yandex_id', $paymentId)
                ->update(['status' => $payment->status,'updated_at' => now()]);
        }

        if($payment->status =='succeeded'){
            return view('payments.success');
        }else {
              return view('payments.fail')->with('fail',$payment->status );
        }
      }else {

        return view('payments.fail')->with('fail',$payment->status );
      }

      //dd($payment);

      //$payment->status =='succeeded'
    }
    public function consultation () {
      return view('products.consultation.index');
    }
}

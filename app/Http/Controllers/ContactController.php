<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Mail\ConsultationRequest;

//use App\Notifications\InboxMessage;
//use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
 public function contactForm(Request $request)
 {

   $name = $request->name;
   $email = $request->email;
   $phone = $request->phone;
   if('Здесь вы можете описать, зачем Вам нужна консультация. Или оставьте это поле пустым.'== $request->customerMessage){
     $customerMessage = '';
   }else{
     $customerMessage = $request->customerMessage;
   }

   Mail::to('v.toguleva@gmail.com')->send(new ContactUs($name,$email, $phone ,$customerMessage));

   return redirect('thx');

 }
 public function consultationRequest(Request $request)
 {

   $name = $request->name;
   $email = $request->email;
   $phone = $request->phone;
   $date = $request->date;
   if('Здесь вы можете описать, зачем Вам нужна консультация. Или оставьте это поле пустым.'== $request->customerMessage){
     $customerMessage = '';
   }else{
     $customerMessage = $request->customerMessage;
   }
   Mail::to('v.toguleva@gmail.com')->send(new ConsultationRequest($name,$email, $phone, $date, $customerMessage));
   return redirect('thx');
 }
}

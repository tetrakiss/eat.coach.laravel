<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Notification;
use App\Notifications\PushPaymentReceived;

class PushController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function store(Request $request){
      $this->validate($request,[
          'endpoint'    => 'required',
          'keys.auth'   => 'required',
          'keys.p256dh' => 'required'
      ]);
      $endpoint = $request->endpoint;
      $token = $request->keys['auth'];
      $key = $request->keys['p256dh'];
      $user = Auth::user();
      $user->updatePushSubscription($endpoint, $key, $token);

      return response()->json(['success' => true],200);
  }

  public function sendPaymentRecivedPush(){

    //$user = \App\User::find(2);

  //  $user->notify(new PushPaymentReceived);
  Notification::send(User::all(),new PushPaymentReceived);
    //return redirect()->back();
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JktRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\JktMail;
use App\Mail\JktMailAdmin;

class PollController extends Controller
{
     public function deegreeJKT() {
       return view('poll.jkt');
     }


     public function deegreeJKTStore(JktRequest $request) {

       $pollResults = (object)[
         'zapor'=>$request->zapor,
         'diarea'=>$request->diarea,
         'konsisten'=>$request->konsisten,
         'zapah'=>$request->zapah,
         'meteor'=>$request->meteor,
         'bol'=>$request->bol,
         'rage'=>$request->rage,
         'feel'=>$request->feel,
       ];
       $total= $request->total;
       $customer=(object)[
         'first_name' =>$request->first_name,
         'last_name' => $request->last_name,
         'email'=> $request->email,
         'phone'=> $request->phone,
       ];
       Mail::to($request->email)->send(new JktMail($customer,$pollResults, $total));
       Mail::to('v.toguleva@gmail.com')->send(new JktMailAdmin($customer,$pollResults, $total));

       return redirect('thx');

     }
}

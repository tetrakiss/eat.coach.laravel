<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JktRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\JktMail;
use App\Mail\JktMailAdmin;

use SEOMeta;
use OpenGraph;
use URL;


class PollController extends Controller
{
     public function deegreeJKT() {
       SEOMeta::setTitle('Eat.coach Индекс тяжести ЖКТ');
       SEOMeta::setDescription('Расчет индекса тяжести ЖКТ (желудочно-кишечного тракта) у детей и взрослых, для принятия дальнейших действий по лечению или коррекции');

       OpenGraph::setDescription('Расчет индекса тяжести ЖКТ (желудочно-кишечного тракта) у детей и взрослых, для принятия дальнейших действий по лечению или коррекции');
       OpenGraph::setTitle('Eat.coach Индекс тяжести ЖКТ');
       OpenGraph::addProperty('locale', 'ru-ru');
       OpenGraph::setUrl(URL::current());
       //OpenGraph::addImage($post->cover->url);
       OpenGraph::addProperty('type', 'articles');
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

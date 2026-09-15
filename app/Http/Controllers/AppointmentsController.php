<?php

namespace App\Http\Controllers;

use App\Appointments;
use App\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customers $customer)
    {
      $customer = Customers::with('children')->where('id',$customer->id)->first();
      //dd($children);
        return view('appointments.create')->with('customer', $customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Appointments::create(array_merge($request->except('_token'), ['added_by_user_id' => Auth::id()]));

      return redirect()->route('customers.show', ['id' => $request->customer_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function show(Appointments $appointments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
     public function edit($customer_id, $id)
     {
       $appointment = Appointments::with('children')->where('id',$id)->first();


       $customer = Customers::with('children')->where('id',$customer_id)->first();
       $children=$customer->children;
       foreach ($children as $c) {
         $childrenList[$c->id]=['id'=>$c->id, 'name'=>$c->first_name.' '.$c->last_name ];
       }
       if(isset($appointment->children)){
         $childrenList[$appointment->children->id]=['id'=>$appointment->children->id, 'selected'=>true, 'name'=>$appointment->children->first_name.' '.$appointment->children->last_name ];
       }


       return view('appointments.edit',compact('appointment','customer_id','childrenList'))->with('childrenList', $childrenList);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $customer_id, $id)
     {
       //save data into database
        Appointments::find($id)->update(array_merge($request->except('_token'), ['added_by_user_id' => Auth::id()]));

        return redirect()->route('customers.show', ['id' => $customer_id]);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
     public function destroy($customer, $appointment)
     {
       $comment = Appointments::findOrFail($appointment);
       $comment->delete();
       return redirect()->back();
     }
}

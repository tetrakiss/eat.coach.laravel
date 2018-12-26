<?php

namespace App\Http\Controllers;

use App\Children;
use App\Customers;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($customer_id)
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

        return view('children.create')->with('customer', $customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Children::create($request->except('_token'));
      //dd($request->all());
      return redirect()->route('customers.show', ['id' => $request->customer_id]);
      //return redirect('customers', ['id'=>$request->customer_id])->with('success', 'Новый ребенок добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function show(Children $children)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Children  $children
     * @return \Illuminate\Http\Response
     */
     public function edit($customer_id, $id)
     {
       $child = Children::find($id);

       return view('children.edit',compact('child','customer_id'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer_id, $id)
    {
      //save data into database
       Children::find($id)->update($request->all());

       return redirect()->route('customers.show', ['id' => $customer_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer, $children)
    {
      //dd($children);
      // delete
      $child = Children::findOrFail($children);
      //$child = Children::where('id', $children)->get();
      //dd($child);
      $child->delete();

      // redirect
      //Session::flash('message', 'Successfully deleted the nerd!');
      return redirect()->back();
    }
    /*public function destroy($id)
    {
      // delete
      $child = Children::where('id',$id)->firstOrFail();
      dd($child);
      //$child->delete();

      // redirect
      //Session::flash('message', 'Ребенок удален');
      //return back();
    }*/
}

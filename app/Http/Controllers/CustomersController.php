<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Children;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $customers = Customers::all();
      return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //User::create(array_merge($request->all(), ['index' => 'value']));

        Customers::create($request->except('_token'));
        return redirect('customers')->with('success', 'Новый клиент добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    /*public function show(Customers $customers)
    {
      dd($customers->id);
      $customer = Customers::where('id', $customers->id)->first();

      return view('customers.show')
            ->with('customer', $customer);
    }*/

    public function show($id)
    {

      $customer = Customers::findOrFail($id);
      $children= $customer->children;
      return view('customers.show')
            ->with('customer', $customer)
            ->with('children', $children);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Children;
use App\Appointments;
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
      //$customers=$this->customers->with('childrens')->all();

    $customers = Customers::with('children')->get();

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
        //save data into database
        $request->merge(['next_date' => date('Y-m-d',strtotime($request->next_date))]);
        $request->merge(['last_date' => date('Y-m-d',strtotime($request->last_date))]);

        Customers::create($request->except('_token'));
        return redirect('admin/customers')->with('success', 'Новый клиент добавлен');
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
      $children = $customer->children;
      $comments = $customer->comments;
      //$allcustomer = Customers::with('children')->with('ChildrenAppointments')->where('id',$id)->first();
      //dd($allcustomer);
      $appointments = $customer->appointments;
      $appointments->map(function ($appointment) {
        $a = Appointments::with('children')->where('id', $appointment->id)->first();
        if(isset($a->children)){
          $appointment->children = $a->children->first_name.' '.$a->children->last_name;
        }else {
          $appointment->children ='';
        }

        return $appointment;
    });
      //dd($appointments);
      return view('customers.show')
            ->with('customer', $customer)
            ->with('children', $children)
            ->with('comments', $comments)
            ->with('appointments', $appointments);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $customer = Customers::find($id);
      return view('customers.edit',compact('customer','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //convert to right date format
      $request->merge(['next_date' => date('Y-m-d',strtotime($request->next_date))]);
      $request->merge(['last_date' => date('Y-m-d',strtotime($request->last_date))]);
        //save data into database
        Customers::find($id)->update($request->all());
        return redirect()->route('customers.index')
                        ->with('success','Клиент успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Customers::find($id)->delete();

       return redirect()->route('customers.index')
                       ->with('success','Клиент успешно удален из базы');

    }

    public function search(Request $request)
    {
    	if($request->has('search')){
    		$customers = Customers::search($request->get('search'))->get();
    	}else{
    		$customers = Customers::get();
    	}

      return view('customers.index', compact('customers'));
    }
}

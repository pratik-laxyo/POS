<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data =  Customer::get();
        return view("customers.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request)
        $data = $request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'phone_number'=>'required'

        ]);
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;
        $data['address_1'] = $request->address_1;
        $data['address_2'] = $request->address_2;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['postcode'] = $request->postcode;
        $data['country'] = $request->country;
        $data['comments'] = $request->comments;
        $data['gstin'] = $request->gstin;
        $data['account_number'] = $request->account_number;

       $post = Customer::create($data);
        return back()->with('success','added Successfully');
        
   // return Response::json($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            // dd( $request);

        $data = $request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'phone_number'=>'required'

        ]);
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;
        $data['address_1'] = $request->address_1;
        $data['address_2'] = $request->address_2;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['postcode'] = $request->postcode;
        $data['country'] = $request->country;
        $data['comments'] = $request->comments;
        $data['gstin'] = $request->gstin;
        $data['account_number'] = $request->account_number;
 // dd( $data);
       $post = Customer::find($id)->update($data);
        return back()->with('success','Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function getCustomer()
    {

        $data = Customer::get();

        $view = view("customers.all-customer",compact('data'))->render();
        //dd( $view );

        return response()->json(['response'=>$view]);

    }
}

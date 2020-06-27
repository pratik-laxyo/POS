<?php

namespace App\Http\Controllers\Office\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Office\Shop\Shop;
use App\Models\Role;
use Hash;
use App\User;
use Illuminate\Support\Facades\Validator;


class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = Shop::all();
        $role = Role::all();
        return view("office.shop.index",compact('shop', 'role'));
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
        $validation = Validator::make($request->all(), [
            'contact_no' => 'unique:shops'
        ]);
        $validation1 = Validator::make($request->all(), [
            'email' => 'unique:shops'
        ]);

        if ($validation->fails()){
            return ["contactErr" => "contact number has already been taken"]; 
        }elseif($validation1->fails()){
            return ["emailErr" => "The email has already been taken"];
        }
        else
        {
            $userTable = [
                'name' => $request->shop_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            $user = User::create($userTable);
            $LastInsertId = $user->id;
            if(!empty($LastInsertId)){
                $data = new Shop;
                $data->shop_name = $request->input('shop_name');
                $data->shop_owner_name = $request->input('shop_owner_name');
                $data->contact_no = $request->input('contact_no');
                $data->email = $request->input('email');
                $data->shop_address = $request->input('shop_address');
                $data->role_id = $request->input('role_id');
                $data->user_id = $LastInsertId;
                $data->save ();
            }
            $user->attachRole($request->role_id);

            return ["successMsg" => "Shop Added Successfully"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'contact_no' => 'required|unique:shops,contact_no,'.$id,
        ]);
  
        Shop::where('id', $id)->update([
                                    'shop_name'=> $request->input('shop_name'), 
                                    'shop_owner_name' => $request->input('shop_owner_name'),
                                    'contact_no' => $request->input('contact_no'),
                                    'email' => $request->input('email'),
                                    'shop_address' => $request->input('shop_address')
                                ]);
  
        return ["successMsg" => "Shop Updated Successfully"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function testUser()
    {
        $shop = Shop::all();
        return view("office.shop.test",compact('shop'));
    }
}

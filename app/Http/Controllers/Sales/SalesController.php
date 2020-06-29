<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Office\Shop\Shop;
use App\Models\Item\Item;
use Helper;
use Response;
use App\Customer;
// use App\Manager\ControlPanel\ControlPanel;
use App\Models\Manager\ControlPanel\Cashier;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $cashier=Cashier::get();
      $shop = Shop::get();
      return view('sales.index',compact('shop','cashier'));
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
      if ($request->item_name) {
        $product = Item::with('ItemTax')->where("item_number",$request->item_name)->get();
        $id = $product[0]->id;
        $item = session()->get('item');
          if(!$item) {
            $item[$id] = [
                    "item_number" => $product[0]->item_number,
                    "name" => $product[0]->name,
                    "unit_price" => $product[0]->unit_price,
                    "ItemTax" => $product[0]->ItemTax,
                    "discounts" => $product[0]->discounts,
                    "quantity" => 1
            ];
            session()->put('item', $item);
                return view('sales.sales-items-display');
          }

          if(isset($item[$id])) {
                $item[$id]['quantity']++;
                session()->put('item', $item);
            return view('sales.sales-items-display');
          }

          $item[$id] = [
              "item_number" => $product[0]->item_number,
              "name" => $product[0]->name,
              "unit_price" => $product[0]->unit_price,
              "ItemTax" => $product[0]->ItemTax,
              "discounts" => $product[0]->discounts,
              "quantity" => 1
          ];
          session()->put('item', $item);
          return view('sales.sales-items-display');

      }else{
        /* code for update quantity.................*/
        $item = session()->get('item');
        $id = $request->id;
        $quantity = $request->quantity;
        if($quantity > 0){
            if(isset($item[$id])) {
                $item[$id]['quantity'] = $quantity;
            session()->put('item', $item);
          }
        }
        return view('receivings.sales-itmes-display');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id || $id == false) {
          $item = session()->get('item'); 
          if(isset($item[$id])) { 
              unset($item[$id]); 
              session()->put('item', $item);
          }
          session()->flash('success', 'Product removed successfully');
          return redirect()->route('sales.index')->with('success','Item deleted successfully');
        }
    }

    public function getSaleItem(Request $request)
    {
        $query = $request->get('query');
        $data =  Item::where('name', 'ILIKE', "%{$query}%")->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        if(count($data) != null)
        {
              foreach($data as $row)
              {
                $output .= '<li id="selectLI"><a id="getItemID" href="?itemId='.$row->id.'" style="pointer-events: none;" value="'.$row->id.'">'.$row->name .' | '.$row->item_number.'  </a></li>';
              }
        }
        else
        {
            $output .= '<li><a href="JavaScript:void(0);">No Items available</a></li>';
        }
        $output .= '</ul>';
        echo $output;
    }

    public function getCustomer(Request $request){
       $query = $request->get('customer_name');
        $data =  Customer::where('first_name', 'ILIKE', "%{$query}%")->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        if(count($data) != null)
        {
              foreach($data as $row)
              {
                $output .= '<li><a id="getItemID" href="?itemId='.$row->id.'" style="pointer-events: none;" value="'.$row->id.'">'.$row->first_name .'   </a></li>';
              }
        }
        else
        {
            $output .= '<li><a href="JavaScript:void(0);">No Items available</a></li>';
        }
        $output .= '</ul>';
        echo $output;
    }

    public function storeCustomer(Request $request)
    {
        $customer = Customer::where("first_name",$request->customer_name[0])->get();
        $id = $customer[0]->id;
        $cartCustomer = session()->get('cartCustomer');
          if(!$cartCustomer) {

            $cartCustomer[$id] = [
                    "customer_name" => $customer[0]->first_name
            ];
            session()->put('cartCustomer', $cartCustomer);
            return view('sales.customer-display');
          }

          if(isset($cartCustomer[$id])) {
            session()->put('cartCustomer', $cartCustomer);
            return view('sales.customer-display');
          }

          $cartCustomer[$id] = [
            "customer_name" => $customer[0]->first_name
          ];
          session()->put('cartCustomer', $cartCustomer);
          return view('sales.customer-display');
      
    }

    public function customerCertDestroy($id){

      if($id || $id == false) {
          $cartCustomer = session()->get('cartCustomer'); 
          if(isset($cartCustomer[$id])) { 
              unset($cartCustomer[$id]); 
              session()->put('cartCustomer', $cartCustomer);
          }
          session()->flash('success', 'Customer removed successfully');
          return redirect()->route('sales.index')->with('success','Item deleted successfully');
        }
    }
 /* this function can be used to update quantity on input field */
    public function updateQty(Request $request)
    {
        $item = session()->get('item');
        $id = $request->id;
        $quantity = $request->quantity;
        if($quantity > 0){
            if(isset($item[$id])) {
                $item[$id]['quantity'] = $quantity;
            session()->put('item', $item);
          }
        }
    }
    public function addCustomer(Request $request){

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
    }
}

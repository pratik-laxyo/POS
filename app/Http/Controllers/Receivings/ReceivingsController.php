<?php

namespace App\Http\Controllers\Receivings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Office\Shop\Shop;
use App\Models\Item\Item;
use Helper;
use Response;
class ReceivingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Shop = Shop::get();
        return view('receivings.index',compact('Shop'));
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
        // dd($request->item_name[1]);
       if ($request->item_name) {
        // dd($request);
        $product = Item::where("item_number",$request->item_name[1])->get();
        $id = $product[0]->id;
        // dd($product);
        $receivingsItems = session()->get('receivingsItems');
          if(!$receivingsItems) {
            $receivingsItems = [
                $id => [
                    "item_number" => $product[0]->item_number,
                    "name" => $product[0]->name,
                    "unit_price" => $product[0]->unit_price,
                    "quantity" => 0
                  ]
            ];
            session()->put('receivingsItems', $receivingsItems);
            return view('receivings.itmes-display');
          }

          if(isset($receivingsItems[$id])) {
            $receivingsItems[$id]['quantity']++;
            session()->put('receivingsItems', $receivingsItems);
            return view('receivings.itmes-display');
          }

          $receivingsItems[$id] = [
                   "item_number" => $product[0]->item_number,
                    "name" => $product[0]->name,
                    "unit_price" => $product[0]->unit_price,
                    "quantity" => 0
          ];
          session()->put('receivingsItems', $receivingsItems);
          return view('receivings.itmes-display');
      }else{

        /* code for aupdate quantity.................*/
        $receivingsItems = session()->get('receivingsItems');
        $id = $request->id;
        $quantity = $request->quantity;
        if($quantity > 0){
            if(isset($receivingsItems[$id])) {
                $receivingsItems[$id]['quantity'] = $quantity;
            session()->put('receivingsItems', $receivingsItems);
          }
        }
          return view('receivings.itmes-display');

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
          $receivingsItems = session()->get('receivingsItems'); 
          if(isset($receivingsItems[$id])) { 
              unset($receivingsItems[$id]); 
              session()->put('receivingsItems', $receivingsItems);
          }
          session()->flash('success', 'Product removed successfully');
          return redirect()->route('receivings.index')->with('success','Item deleted successfully');
        }
    } 
    public function getItem(Request $request)
    {
        $query = $request->get('query');
        //$query = Shop::where('name', 'LIKE',  "%$item%");
        $data =  Item::where('name', 'LIKE', "%{$query}%")->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        // | '.$row->item_number.'
        if(count($data) != null)
          {
              foreach($data as $row)
              {
                $output .= '<li><a id="getItemID" href="?itemId='.$row->id.'" style="pointer-events: none;" value="'.$row->id.'">'.$row->name .' | '.$row->item_number.'  </a></li>';
              }
            }
            else
            {
                $output .= '<li><a href="JavaScript:void(0);">No Items available</a></li>';
            }
          $output .= '</ul>';
          echo $output;
        // dd($query);
    }

     /* this function can be used to update quantity on input field */
    public function updateQty(Request $request)
    {
        $receivingsItems = session()->get('receivingsItems');
        $id = $request->id;
        $quantity = $request->quantity;
        if($quantity > 0){
            if(isset($receivingsItems[$id])) {
                $receivingsItems[$id]['quantity'] = $quantity;
            session()->put('receivingsItems', $receivingsItems);
          }
        }
    }

    public function viewManageTransfer(){

        return view('receivings.manage-transfer.index');
    }
    public function allChalances(){

        return view('receivings.manage-transfer.all-chalances');
    }
}

<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales\SalesManage;
use App\Models\Sales\CertItem;
use App\Models\Office\Shop\Shop;
use App\Models\Manager\ControlPanel\Cashier;
use App\Models\Manager\ControlPanel\CashierShop;
use App\Customer;
use App\Models\Item\Item;
use App\Models\item\items_taxes;

class SalesManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesManage = SalesManage::with('Location')->orderBy('id', 'asc')->where('status',0)->get();
        return view('sales.manage.index',compact('salesManage'));
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
        // dd($request);

        $data = $request->validate([
                'amount_tendered1' => 'required',
                'customer_name'=>'required',
                'sale_amount_due1'=>'required',
                'payment_types'=>'required',
                'selectCashier'=>'required',
                'stock_location'=>'required',
                'customer_id'=>'required'
            ]);
        $data['change_due'] = 'test';
        $data['ref_invoice_number'] = 'test1';
        $data['sgst_cght_sub_total'] = $request->sgst_cght_sub_total;
        $data['igst_sub_total'] = $request->igst_sub_total;
        $lastId = SalesManage::create($data)->id;
        if ($lastId) {
            $last_id = session()->get('lastId');
            if(!$last_id) {
                $lastId = ["lastId" => $lastId];
                session()->put('last_id', $lastId);
                return "Payment Added Succefully";
            }
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
        $data = $request->validate([
                    'amount_tendered1' => 'required',
                    'customer_name'=>'required',
                    'payment_types'=>'required',
                    'ref_invoice_number'=>'required',
                    'customer_id'=>'required',
                    'employee_id'=>'required',
                    'created_at'=>'required',
                    'number_of_payments'=>'required',
                    'created_at'=>'required'
                ]);
        $data['comment'] = $request->comment;
        SalesManage::find($id)->update($data);
        return back()->with('success','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        $currentDate = date('Y-m-d H:i:s');
        $data = SalesManage::where('id', $id)->update(['status' => 1,'deleted_at'=>$currentDate]);
        return back()->with('success','Deleted Successfully');
    }

    public function salesInvoice($id){        
        $salesManage = SalesManage::with('certItems')->where('id',$id)->first();
        $certItem = CertItem::with('itemsDetails','itemTaxes')->where('sales_manage_id',$id)->get();
        $stockLocationId = $salesManage->stock_location;
        $cashiersId = $salesManage->selectCashier;
        $cashierId = $salesManage->stock_location;
        $itemId = $salesManage->certItems->item_id;
        $customerId = $salesManage->customer_id;
        $items_taxes = items_taxes::where('item_id',$itemId)->get();
        $Shop = Shop::where('id',$stockLocationId)->first();
        $cashiers = Cashier::where('id',$cashiersId)->first();
        $cashierShop = CashierShop::where('shop_id',$cashiersId)->first();
        $shopIncharge = Cashier::where('id',$cashierShop->incharge_id)->first();
        $customerDetails = Customer::where('id',$salesManage->customer_id)->first();
        $itemDetails = Item::where('id',$itemId)->first();

        return view('sales.manage.invoice',compact('salesManage','Shop','cashiers','shopIncharge','customerDetails','itemDetails','certItem','items_taxes'));
    }

    public function certItems(Request $request){     
        $salesManageId = session('last_id')['lastId'];
        $data = $request->validate([
                'item_number' => 'required',
                'name'=>'required',
                'quantity'=>'required',
                'unit_price'=>'required',
                'item_id'=>'required',
                'customer_id'=>'required'
            ]);
       $data['sales_manage_id'] = $salesManageId;
       $certItem = CertItem::create($data);
        return "Items Added Succefully";
    }

    public function IgstTax(Request $request){
        foreach(session('item') as $id => $value){
            $discount = json_decode($value['discounts'], true)['retail'];
            dd( $discount);
        }
    }
}

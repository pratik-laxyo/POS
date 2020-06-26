<?php

namespace App\Http\Controllers\Office\Offer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manager\ControlPanel\OfferBundles;
use App\Models\Manager\ControlPanel\LocationGroup;
use App\Models\Office\Offer\DynamicPricing;
use App\Models\Office\Offer\Vouchers;
use App\Models\Office\Offer\PurchaseLimiter;
use App\Models\Manager\MciCategory;
use Carbon\Carbon;
use DB;
use Session;

class OfferController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
    	return view("office.offers.index");
    }

    public function DynamicPricings(){
    	$bundle = OfferBundles::get();
    	$location = LocationGroup::get();
        $pricing = DynamicPricing::with(['pointers', 'locations'])->get();

        $date = date("Y-m-d H:i:s");
        DynamicPricing::where('start_date', '<=', $date)
                        ->where('end_date', '>=', $date)
                        ->update(['status'=> '1']);
    	return view("office.offers.dynamic_price.index", compact("bundle", "location", "pricing"));
    }

    public function Vouchers(){
        $vouchers = Vouchers::get();
    	return view("office.offers.vouchers.index", compact("vouchers"));
    }

    public function PurchaseLimits(){
        $category = MciCategory::get();
        $limits = PurchaseLimiter::with(["limits_category"])->get();
        // dd($limits);
    	return view("office.offers.purchase_limit.index", compact("category", "limits"));
    }

    public function AddPricing(Request $request){
    	$title = $request->title;
    	$location = $request->location;
    	$pointer = $request->pointer;
    	$start_date = $request->start_date;
    	$end_date = $request->end_date;
    	$discount = $request->discount;

    	$data = new DynamicPricing;
    	$data->title = $title;
    	$data->location = $location;
    	$data->pointer = $pointer;
    	$data->start_date = $start_date;
    	$data->end_date = $end_date;
    	$data->discount = $discount;
    	$data->save();
    	return ["successMsg" => "Pricing Added Successfully"];
    }

    public function AddVouchers(Request $request){
        $voucher = str_pad($request->voucher, 2, '0', STR_PAD_LEFT);
        $k_amount = $voucher/1000;
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $code = substr(str_shuffle($str_result), 0, 8);
        $date = date("Y-m-d");
        $expiry = date('Y-m-d', strtotime($date. ' + 90 days'));
        $title = "GC_".$k_amount."K";

        $data = new Vouchers;
        $data->title = $title;
        $data->amount = $voucher;
        $data->code = $code;
        $data->expiry = $expiry;
        $data->save();
        return ["successMsg" => "Voucher Added Successfully"];
    }

    public function UpdateVouchers(Request $request){
        $id = $request->id;
        $expiry = $request->expiry;
        Vouchers::where('id', $id)->update(['expiry'=> $expiry ]);
        return ["successMsg" => "Voucher Updated Successfully"];
    }

    public function PrintVouchers(Request $request){
        $checked = $request->checked;
        $data = Vouchers::whereIn("id", $checked)->get();
        Session::put("data", $data);
        return ["Success"];
    }

    public function ViewVouchers(){
        return view("office.offers.vouchers.voucher");
    }

    public function AddPurchaseLimit(Request $request){
        $plimit_category = $request->plimit_category;
        $plimit_count = $request->plimit_count;

        $data = new PurchaseLimiter;
        $data->category_id = $plimit_category;
        $data->limit_count = $plimit_count;
        $data->save();
    }

    public function UpdateLimitStatus(Request $request){
        if($request->status == '0'){
            PurchaseLimiter::where('id', $request->id)->update(['status'=> '1']);
        }else{
            PurchaseLimiter::where('id', $request->id)->update(['status'=> '0']);            
        }
    }

    public function UpdateLimitCounts(Request $request){
        $limit = $request->plimit_count;
        $id = $request->id;
        PurchaseLimiter::where('id', $id)->update(['limit_count'=> $limit]); 
    }
}

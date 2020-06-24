<?php

namespace App\Http\Controllers\Office\Offer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manager\ControlPanel\OfferBundles;
use App\Models\Manager\ControlPanel\LocationGroup;
use App\Models\Office\Offer\DynamicPricing;

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
        $pricing = DynamicPricing::get();
    	return view("office.offers.dynamic_price.index", compact("bundle", "location", "pricing"));
    }

    public function Vouchers(){
    	return view("office.offers.vouchers.index");
    }

    public function PurchaseLimits(){
    	return view("office.offers.purchase_limit.index");
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
}

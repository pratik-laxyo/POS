<?php

namespace App\Http\Controllers\Manager\ControlPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manager\ControlPanel\Cashier;
use App\Models\Manager\ControlPanel\CashierShop;
use App\Models\Manager\ControlPanel\CustomTab;
use App\Models\Manager\ControlPanel\OfferBundles;
use Illuminate\Support\Facades\Validator;
use App\Models\Office\Shop\Shop;
use App\Models\Manager\MciCategory;
use App\Models\Manager\MciBrand;
use App\Models\Manager\MciSize;
use App\Models\Manager\MciColor;
use App\Models\Manager\MciSubCategory;

class ControlPanel extends Controller
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
        return view("manager.control_panel.index");
    }

    public function Cashier(Request $request){
        $cashier = Cashier::get();
        $shop = Shop::get();
        $CashierShop = CashierShop::get();
        return view("manager.control_panel.cashier", compact('shop', 'cashier', 'CashierShop'));
    }

    public function CashierDetail(Request $request){
        $cashier = Cashier::get();
        return view("manager.control_panel.cashier_detail", compact("cashier"));
    }

    public function OfferBundle(Request $request){
        $bundles = OfferBundles::get();
        foreach ($bundles as $val) {
            # code...
        }
        $category = MciCategory::get();

        return view("manager.control_panel.offer_bundle", compact('category', 'bundles'));
    }

    public function GroupLocation(Request $request){
        $cashier = Cashier::get();
        return view("manager.control_panel.group_location");
    }

    public function CustomTab(Request $request){
        $custom = CustomTab::get();
        return view("manager.control_panel.custom_tab", compact('custom'));
    }

    public function AddCashierDetail(Request $request){
        $request->validate([
            'cashier_name'=>'required',
            'cashier_webkey'=>'required',
            'contact_no'=>'required'
        ]);
        $data = new Cashier;
        $data->name = $request->input('cashier_name');
        $data->webkey = $request->input('cashier_webkey');
        $data->contact_no = $request->input('contact_no');
        $data->save ();
        return ["successMsg" => "Cashier Added Successfully"];
    }

    public function UpdateCashierStatusDetail(Request $request){
        if($request->status == '0'){
            Cashier::where('id', $request->id)->update(['status'=> '1']);
        }else{
            Cashier::where('id', $request->id)->update(['status'=> '0']);            
        }
    }

    public function UpdateCashierDetail(Request $request){
        dd($request);
    }

    public function UpdateCashierShop(Request $request){
        $shop_id = $request->shop_id;
        $cashier_id = json_encode($request->cashier_id);
        $CashierShop = CashierShop::where('shop_id', $shop_id)->get();
        if(count($CashierShop) > 0){

            if($request->type == 'timing'){
                CashierShop::where('shop_id', $shop_id)->update(['open_time'=> $request->open_time, 'close_time'=> $request->close_time]);
            }
            if($request->type == 'incharge'){
                CashierShop::where('shop_id', $shop_id)->update(['incharge_id'=> $request->formData]);
            }
            if($request->type == 'address'){
                CashierShop::where('shop_id', $shop_id)->update(['address'=> $request->formData]);
            }
            if($request->type == 'tnc'){
                CashierShop::where('shop_id', $shop_id)->update(['tnc'=> $request->formData]);
            }
            if($request->type == 'cashierModal'){
                CashierShop::where('shop_id', $shop_id)->update(['cashier_id'=> $cashier_id]);
            }

        }else{

            if($request->type == 'incharge'){
                $data = new CashierShop;
                $data->shop_id = $shop_id;
                $data->incharge_id = $request->input('formData');
                $data->save ();
            }
            if($request->type == 'address'){
                $data = new CashierShop;
                $data->shop_id = $shop_id;
                $data->address = $request->input('formData');
                $data->save ();
            }
            if($request->type == 'tnc'){
                $data = new CashierShop;
                $data->shop_id = $shop_id;
                $data->tnc = $request->input('formData');
                $data->save ();
            }
            if($request->type == 'timing'){
                $data = new CashierShop;
                $data->shop_id = $shop_id;
                $data->open_time = $request->input('open_time');
                $data->close_time = $request->input('close_time');
                $data->save ();
            }
            if($request->type == 'cashierModal'){
                $data = new CashierShop;
                $data->shop_id = $shop_id;
                $data->cashier_id = $cashier_id;
                $data->save ();
            }

        }
        return ["successMsg" => "Fields Updated Successfully"];
    }

    public function fetchCashierShop(Request $request){
        $shop_id = $request->shop_id;
        $CashierShop = CashierShop::where('shop_id', $shop_id)->get();
        if(count($CashierShop) > 0){
            foreach ($CashierShop as $val) {
                $cashier_id = json_decode($val->cashier_id);
                foreach ($cashier_id as $cid) {
                    $cashier[] = Cashier::where('id', $cid)->get();
                }
                $arr = array(
                    'id' => $val->id, 
                    'shop_id' => $val->shop_id,
                    'cashier_id' => json_decode($val->cashier_id), 
                    'incharge_id' => $val->incharge_id, 
                    'open_time' => $val->open_time, 
                    'close_time' => $val->close_time, 
                    'address' => $val->address, 
                    'tnc' => $val->tnc,
                    'cashier_data' => $cashier,
                );
                return $arr;
            }
        }
    }

    public function UpdateCustomTab(Request $request){
        // dd($request);
        $data = new CustomTab;
        $data->title = $request->input('title');
        $data->alias = $request->input('alias');
        $data->tag = $request->input('tag');
        $data->int_val = $request->input('int_val');
        $data->save ();
        return ["successMsg" => "Custom Added Successfully"];
    }

    public function UpdateFetchCustomData(Request $request){
        $tag = $request->tag;
        $customData = CustomTab::where('tag', $tag)->get();
        $data = array();
        if(count($customData) > 0){
            foreach ($customData as $val) {
                $data[] = $val;
            }
        }
        return $data;
    }

    public function UpdateCustomStatus(Request $request){
        if($request->status == '0'){
            CustomTab::where('id', $request->id)->update(['status'=> '1']);
        }else{
            CustomTab::where('id', $request->id)->update(['status'=> '0']);            
        }
    }

    public function GetOfferBundleTypes(Request $request){
        // dd($request);
        $type = $request->type;
        $cat_id = $request->cat_id;
        if($type == 'Category' && $cat_id == 0){
            $data = MciCategory::get();
        }
        if($type == 'Subcategory'){
            $data = MciSubCategory::where("parent_id", $cat_id)->get();
        }
        if($type == 'Brand' && $cat_id == 0){
            $data = MciBrand::get();
        }
        if($type == 'Tag'){
            $data = "";
        }
        if($type == 'Barcode'){
            $data = "";
        }
        return $data;
    }

    public function AddOfferBundle(Request $request){
        // dd($request);
        $title = $request->title;
        $type = $request->type;
        $entities = json_encode($request->select);
        $parent_id = ($request->cat_id) ? $request->cat_id : 0;
        /*if($type != "Subcategory"){
            $parent_id = 0;
        }else{
            $parent_id = $request->cat_id;
        }
        $arr = array(
            "type"      =>    $type,
            "parent_id" =>    $parent_id,
            "entities"  =>    json_encode($entities),
        );
        dd($arr);*/

        $data = new OfferBundles;
        $data->title = $title;
        $data->type = $type;
        $data->bundle = $entities;
        $data->parent_id = $parent_id;
        $data->save ();
        return ["successMsg" => "Offer Bundle Added Successfully"];
    }
}

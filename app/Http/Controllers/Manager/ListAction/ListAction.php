<?php

namespace App\Http\Controllers\Manager\ListAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item\Item;
use App\Models\Item\items_taxes;
use App\Models\Manager\MciCategory;
use App\Models\Manager\MciBrand;
use App\Models\Manager\MciSize;
use App\Models\Manager\MciColor;
use App\Models\Manager\MciSubCategory;
use App\Models\Office\Shop\Shop;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ListActionExport;

class ListAction extends Controller
{
    public function index(){
    	$shop = Shop::get();
    	return view("manager.list_actions.index", compact("shop"));
    }

    public function CSVDownload(Request $request){
    	$shop = $request->location_id;
    	$date = date("d-m");
    	$file_name = 'DBF '.$shop.' POS'.$date.'.csv';
    	return Excel::download(new ListActionExport, $file_name);
    }
}

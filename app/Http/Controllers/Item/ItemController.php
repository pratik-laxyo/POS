<?php

namespace App\Http\Controllers\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item\Item;
use App\Models\Item\items_taxes;
use App\Models\Manager\MciCategory;
use App\Models\Manager\MciBrand;
use App\Models\Manager\MciSize;
use App\Models\Manager\MciColor;
use App\Models\Manager\MciSubCategory;
use App\Models\Manager\ControlPanel\CustomTab;
use App\Models\Office\Shop\Shop;
use App\Imports\ItemsImport;
use DB;
use Excel;
use Helper;

class ItemController extends Controller
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
        $category = MciCategory::where('status',0)->get();
        $subcategory = MciSubCategory::where('status',0)->get();
        $brand = MciBrand::where('status',0)->get();
        $size = MciSize::where('status',0)->get();
        $color = MciColor::where('status',0)->get();
        $custom = CustomTab::where('tag',7)->where('status',0)->get();
        $shop = Shop::get();

        $items = Item::with(["ItemTax", "brandName", "categoryName", "subcategoryName", "sizeName", "colorName"])->get();
        // dd($items);

        return view("items.index",compact('category','size','brand','color','subcategory','shop','items','custom'));
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
        $price_type = 'fixed';
        if($request->unit_price == "0.00"){
            $price_type = "discounted";
        }

        $discounts = array(
            'retail' => $request->retail.".00",
            'wholesale' => $request->wholesale.".00",
            'franchise' => $request->franchise.".00",
            'special' => $request->special.".00",
        );

        $autoId = DB::select(DB::raw("SELECT nextval('items_id_seq')"));
        $nextval = $autoId[0]->nextval;

        $item_number = str_pad($request->category, 2, '0', STR_PAD_LEFT).str_pad($request->subcategory, 3, '0', STR_PAD_LEFT).str_pad($request->brand, 4, '0', STR_PAD_LEFT).str_pad($nextval, 6, '0', STR_PAD_LEFT);

        $arr = array(
            'item_number'           =>      $item_number,
            'name'                  =>      $request->name,
            'category'              =>      $request->category,
            'subcategory'           =>      $request->subcategory,
            'brand'                 =>      $request->brand,
            'size'                  =>      $request->size,
            'color'                 =>      $request->color,
            'model'                 =>      $request->model,
            'unit_price'            =>      $request->unit_price,
            'receiving_quantity'    =>      $request->receiving_quantity,
            'reorder_level'         =>      $request->reorder_level,
            'description'           =>      $request->description,
            'hsn_no'                =>      $request->hsn_no,
            'custom5'               =>      $request->custom5,
            'custom6'               =>      $request->custom6,
            'price_type'            =>      $price_type,
            'discounts'             =>      json_encode($discounts)
        );        
        //dd($arr);

        $item_data = Item::create($arr);
        $LastId = $item_data->id;
        if($LastId){
            $count = count($request->tax_names);
            if($count != 0){
                $x = 0;
                $data = array();
                while($x < $count){
                    if($request->tax_names[$x] !=''){
                        $taxes = array(
                            'item_id' => $LastId,
                            'name' => $request->tax_names[$x],
                            'percent' => $request->tax_percents[$x]
                        );
                        $data[] = $taxes;
                    }
                    $x++;
                }
            }
            foreach ($data as $datas) {
                //dd($datas);
                items_taxes::create($datas);
            }
            return back()->with('success','Item created successfully');
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
        //
    }

    public function fetchData(Request $request) 
    {
        //dd($request);
        $category = $request->cat_id;
        $subcategory = $request->subcat_id;
        $brand = $request->brand_id;
        $shop = $request->stock_location;
        $search = $request->search_item;

        if(!empty($category)){
            $items = Item::with(["ItemTax", "brandName", "categoryName", "subcategoryName", "sizeName", "colorName"])->where('category', $category)->get(); 
        }
        if(!empty($subcategory)){
            $items = Item::with(["ItemTax", "brandName", "categoryName", "subcategoryName", "sizeName", "colorName"])->where('subcategory', $subcategory)->get(); 
        }
        if(!empty($brand)){
            $items = Item::with(["ItemTax", "brandName", "categoryName", "subcategoryName", "sizeName", "colorName"])->where('brand', $brand)->get(); 
        }
        if(!empty($category) && !empty($subcategory)){
            $items = Item::with(["ItemTax", "brandName", "categoryName", "subcategoryName", "sizeName", "colorName"])
                    ->where('category', $category)
                    ->where('subcategory', $subcategory)
                    ->get(); 
        }
        if(!empty($category) && !empty($brand)){
            $items = Item::with(["ItemTax", "brandName", "categoryName", "subcategoryName", "sizeName", "colorName"])
                    ->where('category', $category)
                    ->where('brand', $brand)
                    ->get(); 
        }
        if(!empty($subcategory) && !empty($brand)){
            $items = Item::with(["ItemTax", "brandName", "categoryName", "subcategoryName", "sizeName", "colorName"])
                    ->where('subcategory', $subcategory)
                    ->where('brand', $brand)
                    ->get(); 
        }
        if(!empty($subcategory) && !empty($category) && !empty($brand)){
            $items = Item::with(["ItemTax", "brandName", "categoryName", "subcategoryName", "sizeName", "colorName"])
                    ->where('category', $category)
                    ->where('subcategory', $subcategory)
                    ->where('brand', $brand)
                    ->get(); 
        }
        if(!empty($search)){
            $items = Item::with(["ItemTax", "brandName", "categoryName", "subcategoryName", "sizeName", "colorName"])
            ->where('name', 'ILIKE', "%{$search}%")
            ->orWhere('category', 'ILIKE', "%{$search}%")
            ->orWhere('subcategory', 'ILIKE', "%{$search}%")
            ->orWhere('brand', 'ILIKE', "%{$search}%")
            ->orWhere('item_number', 'ILIKE', "%{$search}%")
            ->orWhere('hsn_no', 'ILIKE', "%{$search}%")
            ->get();
        }
        if(empty($subcategory) && empty($category) && empty($brand)){
            $category = MciCategory::where('status',0)->get();
            $subcategory = MciSubCategory::where('status',0)->get();
            $brand = MciBrand::where('status',0)->get();
            $size = MciSize::where('status',0)->get();
            $color = MciColor::where('status',0)->get();
            $shop = Shop::get();

            $items = Item::with(["ItemTax", "brandName", "categoryName", "subcategoryName", "sizeName", "colorName"])->get();
        }       

        return view('items.fetch', compact('items'));
    }

    public function excelImportItems(Request $request){
        $datas = Excel::import(new ItemsImport, request()->file('file_path'));
        if($datas){
            dd($datas);
            // return redirect()->route('items.index')->with('success','Item Added successfully.');
        }
    }
}

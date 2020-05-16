<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];
    protected $table = 'items';

    public function ItemTax() {
    	return $this->hasMany('App\Models\item\items_taxes', 'item_id');
    }
    public function brandName(){
    	return $this->belongsTo('App\Models\Manager\MciBrand', 'brand');
    }
    public function colorName(){
    	return $this->belongsTo('App\Models\Manager\MciColor', 'color');
    }
    public function categoryName(){
    	return $this->belongsTo('App\Models\Manager\MciCategory', 'category');
    }
    public function subcategoryName(){
    	return $this->belongsTo('App\Models\Manager\MciSubCategory', 'subcategory');
    }
    public function sizeName(){
    	return $this->belongsTo('App\Models\Manager\MciSize', 'size');
    }
}

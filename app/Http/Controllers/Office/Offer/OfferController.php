<?php

namespace App\Http\Controllers\Office\Offer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}

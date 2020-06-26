<?php

namespace App\Http\Controllers\Office\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigurationController extends Controller
{
    public function index(){
    	return view("office.configuration.index");
    }
}

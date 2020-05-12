<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manager\MciCategory;
use App\Models\Manager\MciBrand;
use App\Models\Manager\MciSize;
use App\Models\Manager\MciColor;
use App\Models\Manager\MciSubCategory;



class ManagerMCIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mciCategory = MciCategory::where('status',0)->get();
        $mciSize = MciSize::where('status',0)->get();
        $mciBrand = MciBrand::where('status',0)->get();
        $mciColor = MciColor::where('status',0)->get();
        $mciSubCategory = MciSubCategory::where('status',0)->get();
       // dd($request);
        return view("manager.mci.index",compact('mciCategory','mciSize','mciBrand','mciColor','mciSubCategory'));
        
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
        $data = $request->validate(['category_name'=>'required|unique']);
        MciCategory::create($data);
        return back()->with('success','added Successfully');
        
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
}

<?php

namespace App\Http\Controllers;

use App\Models\HomeService;
use App\Models\IndustrialService;
use App\Models\Innovation;
use App\Models\Setting;
use App\Models\SliderCategory;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        $sliders = SliderCategory::with('Sliders')
       ->where('category_status', '=', '1')
       ->where('category_position', 'top')
       ->whereNull('deleted_at')
       ->first();
       $sliders_top = @$sliders->Sliders ?? collect(); // Use an empty collection as the default value if $sliders->Sliders is null

       $home_services = HomeService::whereNull('deleted_at')->orderBy('order_no','ASC')->get();

       $why_choose_us = WhyChooseUs::whereNull('deleted_at')->orderBy('created_at','DESC')->get();
       $industrial_services = IndustrialService::whereNull('deleted_at')->orderBy('created_at','DESC')->get();
       $innovation = Innovation::first();


        return view('home.home',compact('setting','sliders_top','home_services','why_choose_us','industrial_services','innovation'));
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
        //
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

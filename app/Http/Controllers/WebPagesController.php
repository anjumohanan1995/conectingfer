<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Policy;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Technology;
use Illuminate\Http\Request;

class WebPagesController extends Controller
{
    public function aboutUs() {
        
        $data=AboutUs::first();
        return view('pages.about_us',compact('data'));
    }


    public function technology() {

        $datas=Technology::where('deleted_at',null)->get();
        return view('pages.technology',compact('datas'));
    }


    public function industrialAutomation() {

        return view('pages.industrial_automation');
    }
    public function manufacturing() {

        return view('pages.manufacturing');
    }
    public function logisticsManagement() {

        return view('pages.logistics_management');
    }
    public function energy() {

        return view('pages.energy');
    }
    public function services() {

        $datas=Service::where('deleted_at',null)->get();
        return view('pages.services',compact('datas'));
    }
    public function contact() {

        $data=Contact::first();
        $setting = Setting::first();
        return view('pages.contact_us',compact('data','setting'));
    }

    public function privacyPolicy() {
        
        $data=Policy::where('slug','privacy-policy')->first();
        return view('pages.policy',compact('data'));
    }
    public function cookiePolicy() {
        
        $data=Policy::where('slug','cookie-policy')->first();
        return view('pages.policy',compact('data'));
    }




}

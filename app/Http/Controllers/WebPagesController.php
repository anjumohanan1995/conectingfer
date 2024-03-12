<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPagesController extends Controller
{
    public function aboutUs() {
        
        return view('pages.about_us');
    }


    public function technology() {

        return view('pages.technology');
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

        return view('pages.services');
    }
    public function contact() {

        return view('pages.contact_us');
    }





}

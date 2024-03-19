<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\HomeContent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Auth;
use DB;
use App\User;
use App\Query;
use Carbon\Carbon;
use Redirect;
class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function privacyPolicy(Request $request)
    {       
        $data = Policy::where('slug','privacy-policy')->first();
        return view('privacy_policy',compact('data'));
    }

   
    public function privacyPolicyStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'title' => 'required',
          
    ]);
  
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $data = $request->all();


        $policy = Policy::where('slug',$request->slug)->first();
        if($policy == ''){

            $policy=   Policy::create([
            'title' => @$request->title? $request->title:'']);
        }
        $policy->title = @$request->title;
        $policy->slug = @$request->slug;
        $policy->sub_title = @$request->sub_title;
        $policy->content = @$request->content;
        $policy->created_by = auth()->user()->id;
        $policy->save();
     
        return redirect()->back()->with('status','Created Successfully.');
    }


    public function cookiePolicy(Request $request)
    {       
        $data = Policy::where('slug','cookie-policy')->first();
        return view('cookie_policy',compact('data'));
    }

   
    public function cookiePolicyStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'title' => 'required',
          
    ]);
  
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $data = $request->all();


        $policy = Policy::where('slug',$request->slug)->first();
        if($policy == ''){

            $policy=   Policy::create([
            'title' => @$request->title? $request->title:'']);
        }
        $policy->title = @$request->title;
        $policy->slug = @$request->slug;
        $policy->sub_title = @$request->sub_title;
        $policy->content = @$request->content;
        $policy->created_by = auth()->user()->id;
        $policy->save();
     
        return redirect()->back()->with('status','Created Successfully.');
    }


}

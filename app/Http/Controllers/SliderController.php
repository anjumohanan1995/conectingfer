<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slider;

use App\Models\SliderCategory;
use Illuminate\Support\Facades\Validator;
use Redirect;

use Img;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       $sliders = Slider::latest()->paginate(5);

        return view('sliders.index',compact('sliders'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function createSlider($id)
    {
        //dd($id);
        return view('sliders.create',compact('id'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),
        [

            'title' => 'required|regex:/^[\pL\s\-]+$/u|max:250',
            'slider_style' => 'required|regex:/^[a-zA-Z0-9 ]+$/',
            'slider_status' => 'required|regex:/^[a-zA-Z0-9 ]+$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validate->fails()) {

            return Redirect::back()->withErrors($validate);
        }
        if($request->file('image')!='')
        {
            $image = $request->file('image');

            $input['image'] = time().'.'.$image->extension();
            $destinationPath = public_path('/admin/uploads/thumbnails');
            $image->move($destinationPath, $input['image']);

        }else{
            $input['image']='';
        }
        if($request->file('video')!='')
        {
            $video = $request->file('video');

            $input['video'] = time().'.'.$video->extension();



            $destinationPath = public_path('/admin/uploads/thumbnails');


            $video->move($destinationPath, $input['video']);
        }else{
            $input['video']='';
        }



            if($request->button_text&&$request->button_url)
            {
              $bstatus=1;
            }
            else
            {
                $bstatus=0;
            }
            $slider=new Slider();
            $slider->slider_category_id=$request->cid;
            $slider->title=$request->title;
            $slider->link=@$request->link;
            $slider->description=$request->description;
            $slider->image=$input['image'];
            $slider->video=$input['video'];
            $slider->button_text=$request->button_text;
            $slider->button_url=$request->button_url;
            $slider->button_one_text=$request->button_one_text;
            $slider->button_one_url=$request->button_one_url;
            $slider->button_status=$bstatus;

            $slider->slider_style=$request->slider_style;
            $slider->color=$request->color??'45b2fb';
            $slider->slider_status=$request->slider_status;

            if($slider->save())
            {
                return redirect()->route('slidercategories.edit',$request->cid)

                        ->with('success','Slider saved successfully');
            }


    }

    public function show($id)
    {
        //
    }


    public function edit(Slider $slider)
    {
        $categories = SliderCategory::all();
        return view('sliders.edit',compact('slider','categories'));
    }

    public function update(Request $request,$id)
    {
        $validate = Validator::make($request->all(),
        [

            'title' => 'required|regex:/^[\pL\s\-]+$/u',
            'description' => ['nullable', 'string', function ($attribute, $value, $fail) {
                // Check if the input contains any HTML tags or scripts
                if ($value !== strip_tags($value)) {
                    $fail('The :attribute cannot contain HTML or scripts.');
                }
            }],
            'button_text' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'button_url' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'button_one_text' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'button_one_url' => 'nullable|regex:/^[\pL\s\-]+$/u',

            'slider_style' => 'required|regex:/^[\pL\s\-]+$/u',
            'slider_status' => 'required|regex:/^[a-zA-Z0-9 ]+$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video' => 'nullable|mimes:mp4|max:2048',
        ]);
        if ($validate->fails()) {

            return Redirect::back()->withErrors($validate);
        }
        $categories = SliderCategory::all();
        $request->validate([
            'title' => 'required',

        ]);
        if($request->file('image')!='')
        {
        $image = $request->file('image');

        $input['image'] = time().'.'.$image->extension();



        $destinationPath = public_path('/admin/uploads/thumbnails');

        /*$img = Img::make($image->path());
        if($request->cposition=="testimonial")
        {
            $width=65;
            $height=65;
        }
        else if($request->cposition=="photos-and-videos")
        {
            $width=360;
            $height=282;
        }
        else if($request->cposition=="initiative")
        {
            $width=386;
            $height=261;
        }
        else
        {
            $width=1500;
            $height=720;

        }

        $img->resize($width,$height, function ($constraint) {

            //$constraint->aspectRatio();

        })->save($destinationPath.'/'.$input['image']);*/



        //$destinationPath = public_path('/admin/uploads/images');
        $image->move($destinationPath, $input['image']);
    }
    else{
        $input['image']=$request->imgs;
    }

     if($request->file('video')!='')
        {
           // dd($request->file('video'));
        $video = $request->file('video');

        $input['video'] = time().'.'.$video->extension();



        $destinationPath = public_path('/admin/uploads/thumbnails');


        $video->move($destinationPath, $input['video']);
    }
    else{
        $input['video']=$request->videos;
    }
    //dd( $input['video']);




            if($request->button_text&&$request->button_url)
            {
              $bstatus=1;
            }
            else
            {
                $bstatus=0;
            }
            $slider=Slider::find($id);
            $slider->title=$request->title;
            $slider->link=@$request->link;
            $slider->description=$request->description??''
            ;
            $slider->slider_type=$request->slider_type??'';
            $slider->image=$input['image'];
            $slider->video=$input['video'];
            $slider->button_text=$request->button_text;
            $slider->button_url=$request->button_url;
            $slider->button_one_text=$request->button_one_text;
            $slider->button_one_url=$request->button_one_url;
            $slider->button_status=$bstatus;
            $slider->slider_style=$request->slider_style;
            $slider->slider_status=$request->slider_status;
            $slider->color=$request->color??'45b2fb';
            $slider->slider_category_id=$request->slider_category_id;

            if($slider->update())
            {
                return redirect()->route('slidercategories.edit',$request->slider_category_id)

                ->with('success','Slider updated successfully');
            }
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();


        return redirect()->route('slidercategories.edit',$slider->slider_category_id)

                        ->with('success','Slider deleted successfully');
    }
}

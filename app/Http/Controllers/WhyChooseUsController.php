<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view("why_choose_us.index",compact('setting'));
    }

    public function create()
    {
        return view("why_choose_us.create");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
          
           
                 
        ]);
      
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
    
    if ($request->hasfile('image')) {
    
        $images = $request->image;
        $img = time() . rand(100, 999) . '.' . $images->extension();
    
        $images->move(public_path('/why_choose_us'), $img);
    
        $data['image'] = $img;
    
    }else{
        $data['image'] = '';
    }
    $tech = WhyChooseUs::create([
        'title'=> @$request->title,
        'description'=> @$request->description,
        'image' => $data['image']??'',
        'created_by' => auth()->user()->id,

    ]);
         
    return redirect()->route('why-choose-us.index')->with('status', 'Created successfully');
}

    public function show(WhyChooseUs $service_list)
    {
        // Logic for displaying a specific technology
    }

    public function edit($id)
    {
        $data = WhyChooseUs::find($id);
      
              if (!$data) {
                  return abort(404); // Or handle the case when the record is not found
              }      
              return view('why_choose_us.edit', compact('data'));
    }

    public function update(Request $request,$id)
    {
        $validate = Validator::make($request->all(),
        [
         'title' => 'required',
         'description' => 'nullable',


        ]);
    if ($validate->fails()) {
        return Redirect::back()->withErrors($validate);
    }
    $homepage = WhyChooseUs::where('id', $id)->first();

    if ($request->hasfile('image')) {
    
        $images = $request->image;
        $img = time() . rand(100, 999) . '.' . $images->extension();
    
        $images->move(public_path('/why_choose_us'), $img);
    
        $data['image'] = $img;
    
    }else{
        $data['image'] = $homepage->image;
    }

       
        $homepage->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'image' => $data['image']??'',
            'created_by' => auth()->user()->id,

        ]);
        return redirect()->route('why-choose-us.index')->with('status','Updated successfully.');
    }

    public function destroy($id)
    {
        
        $tech= WhyChooseUs::find($id)->delete();
       
       return response()->json([
        'status' => 'Deleted Successfully.'
    ]);
    }

    public function getWhyChooseUs(Request $request)
    {

        $title = @$request->title;

        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value



            // Total records
            $totalRecord = WhyChooseUs::where('deleted_at', null);
          
            if ($title != "") {
                $totalRecord->where('title', 'like', "%" . $title . "%");
            }

            $totalRecords = $totalRecord->select('count(*) as allcount')->count();
            $totalRecordswithFilte = WhyChooseUs::where('deleted_at', null);

            if ($title != "") {
                $totalRecordswithFilte->where('title', 'like', "%" . $title . "%");
            }

            $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

            $items = WhyChooseUs::where('deleted_at', null)->orderBy($columnName, $columnSortOrder);
            if ($title != "") {
                $items->where('title', 'like', "%" . $title . "%");
            }


            $records = $items->orderBy('created_at', 'DESC')->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = 0;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $title = $record->title;
            $description = $record->description;
            $image = @$record->image;
            $icon = $record->icon;

         
            $data_arr[] = [
                "id" => $id,
                "no" => $i,
                "title" => $title,        
                "description" => substr($description, 0, 50)."....",
                "image" => '<a href="/why_choose_us/'.$image.'" target="_blank">'.$image.'</a>',
                "edit" => '<div class="settings-main-icon">
                              <a class="deleteItem" data-id="' . $id . '"><i class="fa fa-trash bg-danger "></i></a>
                              <a href="' . route('why-choose-us.edit', $id) . '"><i class="fa fa-edit bg-info me-1"></i></a>
                           </div>'
            ];
            
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response);
    }
    public function whyChooseUsSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'why_choose_title' => 'required',      
             
    ]);
  
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $data = $request->all();

        $setting = Setting::first();
        if($setting == ''){

            $setting=   Setting::create([
            'why_choose_title' => @$request->title? $request->why_choose_title:'']);
        }
        $setting->why_choose_title = @$request->why_choose_title;
        $setting->why_choose_subtitle = @$request->why_choose_subtitle;
        $setting->save();
     
        return redirect()->back()->with('status','Created Successfully.');
    }
}

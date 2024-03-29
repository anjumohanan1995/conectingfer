<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
namespace App\Http\Controllers;
use App\Models\IndustrialService;
use App\Models\Service;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class IndustrialServiceController extends Controller
{
    public function index()
    {
        return view("industrial_service.index");
    }

    public function create()
    {
        return view("industrial_service.create");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'nullable|max:2048',
           
                 
        ]);
      
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
    
    if ($request->hasfile('image')) {
    
        $images = $request->image;
        $img = time() . rand(100, 999) . '.' . $images->extension();
    
        $images->move(public_path('/Industrial_Services'), $img);
    
        $data['image'] = $img;
    
    }else{
        $data['image'] = '';
    }
    $tech = IndustrialService::create([
        'title'=> @$request->title,
        'description'=> @$request->description,
        'image' => $data['image']??'',
        'created_by' => auth()->user()->id,

    ]);
         
    return redirect()->route('industrial-services.index')->with('status', 'Created successfully');
}

    public function show(IndustrialService $service_list)
    {
        // Logic for displaying a specific technology
    }

    public function edit($id)
    {
        $data = IndustrialService::find($id);
      
              if (!$data) {
                  return abort(404); // Or handle the case when the record is not found
              }      
              return view('industrial_service.edit', compact('data'));
    }

    public function update(Request $request,$id)
    {
        $validate = Validator::make($request->all(),
        [
         'title' => 'nullable|regex:/^[a-zA-Z0-9 ]+$/',
         'description' => 'nullable',


        ]);
    if ($validate->fails()) {
        return Redirect::back()->withErrors($validate);
    }
    $homepage = IndustrialService::where('id', $id)->first();

    if ($request->hasfile('image')) {
    
        $images = $request->image;
        $img = time() . rand(100, 999) . '.' . $images->extension();
    
        $images->move(public_path('/Industrial_Services'), $img);
    
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
        return redirect()->route('industrial-services.index')->with('status','Updated successfully.');
    }

    public function destroy($id)
    {
        
        $tech= IndustrialService::find($id)->delete();
       
       return response()->json([
        'status' => 'Deleted Successfully.'
    ]);
    }

    public function getIndustrialServices(Request $request)
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
            $totalRecord = IndustrialService::where('deleted_at', null);
          
            if ($title != "") {
                $totalRecord->where('title', 'like', "%" . $title . "%");
            }

            $totalRecords = $totalRecord->select('count(*) as allcount')->count();
            $totalRecordswithFilte = IndustrialService::where('deleted_at', null);

            if ($title != "") {
                $totalRecordswithFilte->where('title', 'like', "%" . $title . "%");
            }

            $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

            $items = IndustrialService::where('deleted_at', null)->orderBy($columnName, $columnSortOrder);
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
            $image = $record->image;

         
            $data_arr[] = [
                "id" => $id,
                "no" => $i,
                "title" => $title,           
                "description" => substr($description, 0, 50)."....",
                "image" => '<a href="/Industrial_Services/'.$image.'" target="_blank">'.$image.'</a>',
                "edit" => '<div class="settings-main-icon">
                              <a class="deleteItem" data-id="' . $id . '"><i class="fa fa-trash bg-danger "></i></a>
                              <a href="' . route('industrial-services.edit', $id) . '"><i class="fa fa-edit bg-info me-1"></i></a>
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
}

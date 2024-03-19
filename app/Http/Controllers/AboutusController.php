<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Models\Aboutus;
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
class AboutusController extends Controller
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
    public function index(Request $request)
    {       
        $data = Aboutus::first();
        return view('aboutus',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    $images->move(public_path('/Aboutus'), $img);

    $data['image'] = $img;

}else{
    $data['image'] = '';
}
        $innovation = Aboutus::where('slug',$request->slug)->first();
        if($innovation == ''){

            $innovation=   Aboutus::create([
            'title' => @$request->title? $request->title:'']);
        }
        $innovation->title = @$request->title;
        $innovation->slug = @$request->slug;
        $innovation->sub_title = @$request->sub_title;
        $innovation->content = @$request->content;
        $innovation->image = $data['image']??'';
        $innovation->created_by = auth()->user()->id;
        $innovation->save();
     
        return redirect()->back()->with('status','Created Successfully.');
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
        $data = HomeContent::where('_id', $id)->first();
        return view('homepagecontent.edit',compact('data'));
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
        $validate = Validator::make($request->all(),
        [
         'section' => 'required',
         //'name' => 'required',
         'name' => ['nullable','max:50', 'regex:/^[\pL\s\-]+$/u',  function ($attribute, $value, $fail) {
            // Check if the input contains any HTML tags or scripts
            if ($value !== strip_tags($value)) {
                $fail('The :attribute cannot contain HTML or scripts.');
            }
        }],
       'head_line' => ['nullable',  function ($attribute, $value, $fail) {
        // Check if the input contains any HTML tags or scripts
        if ($value !== strip_tags($value)) {
            $fail('The :attribute cannot contain HTML or scripts.');
        }
      }],
     'description' => ['nullable',  function ($attribute, $value, $fail) {
        // Check if the input contains any HTML tags or scripts
        if ($value !== strip_tags($value)) {
            $fail('The :attribute cannot contain HTML or scripts.');
        }
     }],
     'image_title' => ['nullable',  function ($attribute, $value, $fail) {
        // Check if the input contains any HTML tags or scripts
        if ($value !== strip_tags($value)) {
            $fail('The :attribute cannot contain HTML or scripts.');
        }
    }],
    'experience' => ['nullable',  function ($attribute, $value, $fail) {
        // Check if the input contains any HTML tags or scripts
        if ($value !== strip_tags($value)) {
            $fail('The :attribute cannot contain HTML or scripts.');
        }
    }],
    'image' =>'nullable|image',
        ]);

        if ($validate->fails()) {
            return Redirect::back()->withErrors($validate);
        }
        $homepage = HomeContent::where('_id', $id)->first();
        $file="";
        if ($request->image != null) {
          $image = $request->image;

          $fileName = time() . rand(100, 999) . '.' . $image->extension();
          $image->move(public_path('/images/homepage'), $fileName);
          $file=$fileName;

        }
        else{
            $file = $homepage->image;
        }
        $file1="";
        if ($request->vimage != null) {
          $image = $request->vimage;

          $fileName = time() . rand(100, 999) . '.' . $image->extension();
          $image->move(public_path('/images/homepage'), $fileName);
          $file1=$fileName;


        }
        else{
            $file1 = $homepage->values_image;
        }
        $file_v='';
        if ($request->video != null) {
          $video = $request->video;

          $fileName = time() . rand(100, 999) . '.' . $video->extension();
          $video->move(public_path('/images/homepage'), $fileName);
          $file_v=$fileName;


        }else{
            $file_v=$homepage->video;
        }

        $img1="";
        if ($request->image1 != null) {
          $image = $request->image1;

          $fileName = time() . rand(100, 999) . '.' . $image->extension();
          $image->move(public_path('/images/homepage'), $fileName);
          $img1=$fileName;


        }
        else{
            $img1=$homepage->fp_image;
        }
        $img2="";
        if ($request->image2 != null) {
          $image = $request->image2;

          $fileName = time() . rand(100, 999) . '.' . $image->extension();
          $image->move(public_path('/images/homepage'), $fileName);
          $img2=$fileName;


        }  else{
            $img2=$homepage->sp_image;
        }
        $homepage->update([
            'name'=> $request->name,
            'section'=> $request->section,
            'head_line'=> $request->head_line,
            'description'=> $request->description,
            'image'=> $file??'',
            'video'=> $file_v??'',
            'image_title'=> $request->image_title,
            'experience'=> $request->experience,
            'vision'=> $request->vision,
            'vision_color'=> $request->color,
            'vision_image'=> $file??'',
            'values'=> $request->values,
            'values_color'=> $request->vcolor,
            'values_image'=> $file1??'',
            'vision_content'=> $request->vision_content,
            'value_content'=> $request->value_content,

            'fp_image'=> $img1??'',
            'fp_name'=> $request->name1,
            'fp_designation'=> $request->designation1,

            'sp_image'=> $img2??'',
            'sp_name'=> $request->name2,
            'sp_designation'=> $request->designation2,
            'created_by' => auth()->user()->id,

        ]);
        return redirect()->route('homepage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homepage= HomeContent::find($id)->delete();
        return redirect()->route('homepage.index');
    }
    public function getHomeContents(Request $request)
    {

        $title = $request->title;

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
            $totalRecord = HomeContent::where('deleted_at', null);
            if ($title != "") {
                $totalRecord->where('name', 'like', "%" . $title . "%");
            }

            $totalRecords = $totalRecord->select('count(*) as allcount')->count();
            $totalRecordswithFilte = HomeContent::where('deleted_at', null);

            if ($title != "") {
                $totalRecordswithFilte->where('name', 'like', "%" . $title . "%");
            }

            $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

            $items = HomeContent::where('deleted_at', null)->orderBy($columnName, $columnSortOrder);
            if ($title != "") {
                $items->where('name', 'like', "%" . $title . "%");
            }


            $records = $items->orderBy('created_at', 'DESC')->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = 0;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $title = $record->name;
            $section = $record->section;

            $description = $record->description;
            $image = $record->image;
            $custom_field1 = $record->custom_field1;
            $custom_field2 = $record->custom_field2;

            $creator = User::where('_id', $record->created_by)->first();
            $created_by = @$creator->name;

            $date = $record->created_at->format('d-m-y');
            // $time = $record->created_at->format('h:i A');

            // fetching the name of depot.
            // @$depot = Depot::where('_id',$record->depot)->where('deleted_at', null)->first();
            // @$depot = $depot->name;


            $data_arr[] = array(
                "id" => $id,
                "no" => $i,
                "title" => $title,
                "section" => $section,
                "description" =>  substr($description, 0, 50)."....",
                "custom_field1" => $custom_field1,
                "custom_field2" => $custom_field2,
                "image" => '<a href="/images/homepage/'.$image.'" target="_blank" >'.$image.'</a>',
                "created_by" => $created_by,

                "date" => $date,
                // "time" => $time,
                "edit" => '<div class="settings-main-icon"><a class="deleteItem" data-id="' . $id . '"><i class="fa fa-trash bg-danger "></i></a>
                    <a  href="' . url('homepage/edit/'.$id). '" ><i class="fa fa-edit bg-info me-1"></i></a>
                    <a  href="' . url('view-homepage/'.$id). '" ><i class="fa fa-eye bg-success me-1"></i></a>



                </div>'



            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response);
    }
    public function viewDetails($id)
    {
        $data= HomeContent::where('_id',$id)->first();
        return view('homepagecontent.view',compact('data'));
    }


    public function getQueries(Request $request)
    {

        $name = $request->name;

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
            $totalRecord = Query::where('deleted_at', null);
            if ($name != "") {
                $totalRecord->where('name', 'like', "%" . $name . "%");
            }

            $totalRecords = $totalRecord->select('count(*) as allcount')->count();
            $totalRecordswithFilte = Query::where('deleted_at', null);

            if ($name != "") {
                $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
            }

            $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

            $items = Query::where('deleted_at', null)->orderBy($columnName, $columnSortOrder);
            if ($name != "") {
                $items->where('name', 'like', "%" . $name . "%");
            }


            $records = $items->orderBy('created_at', 'DESC')->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = 0;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $email = $record->email;

            $message = $record->message;

            $custom_field1 = $record->custom_field1;
            $custom_field2 = $record->custom_field2;



            $date = $record->created_at->format('d-m-y');
            $time = $record->created_at->format('g:i a');
            // $time = $record->created_at->format('h:i A');

            // fetching the name of depot.
            // @$depot = Depot::where('_id',$record->depot)->where('deleted_at', null)->first();
            // @$depot = $depot->name;


            $data_arr[] = array(
                "id" => $id,
                "no" => $i,
                "name" => $name,
                "email" => $email,
                "message" =>  substr($message, 0, 50)."....",
                "custom_field1" => $custom_field1,
                "custom_field2" => $custom_field2,
                //"image" => '<a href="/images/homepage/'.$image.'" target="_blank" >'.$image.'</a>',
                //"created_by" => $created_by,

                "date" => $date,
                "time" => $time,
                "action" =>'<div class="settings-main-icon">   <a  href="' . url('view-query/'.$id). '" target="_blank"><i class="fa fa-eye bg-success me-1"></i></a>',
                // "time" => $time,
                // "edit" => '<div class="settings-main-icon"><a class="deleteItem" data-id="' . $id . '"><i class="fa fa-trash bg-danger "></i></a>
                //     <a  href="' . url('homepage/edit/'.$id). '" ><i class="fa fa-edit bg-info me-1"></i></a>
                //     <a  href="' . url('view-homepage/'.$id). '" ><i class="fa fa-eye bg-success me-1"></i></a>



                // </div>'



            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response);
    }
    public function queryList()
    {
//Query::truncate();
        return view('homepagecontent.queries');
    }
    public function queryDetails($id){
        $data=Query::where('_id',$id)->first();
        return view('homepagecontent.queryDetails',compact('data'));
    }

    public function contactList()
    {
        return view('homepagecontent.contact_list');
    }

    public function getContacts(Request $request)
    {

        $name = $request->name;

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
            $totalRecord = Contact::where('deleted_at', null);
            if ($name != "") {
                $totalRecord->where('name', 'like', "%" . $name . "%");
            }

            $totalRecords = $totalRecord->select('count(*) as allcount')->count();
            $totalRecordswithFilte = Contact::where('deleted_at', null);

            if ($name != "") {
                $totalRecordswithFilte->where('name', 'like', "%" . $name . "%");
            }

            $totalRecordswithFilter = $totalRecordswithFilte->select('count(*) as allcount')->count();

            $items = Contact::where('deleted_at', null)->orderBy($columnName, $columnSortOrder);
            if ($name != "") {
                $items->where('name', 'like', "%" . $name . "%");
            }


            $records = $items->orderBy('created_at', 'DESC')->skip($start)->take($rowperpage)->get();




        $data_arr = array();
        $i = 0;

        foreach ($records as $record) {
            $i++;
            $id = $record->id;
            $name = $record->name;
            $email = $record->email;
            $subject = $record->subject;
            $message = $record->message;

            $custom_field1 = $record->custom_field1;
            $custom_field2 = $record->custom_field2;



            $date = $record->created_at->format('d-m-y');
            $time = $record->created_at->format('g:i a');
            // $time = $record->created_at->format('h:i A');

            // fetching the name of depot.
            // @$depot = Depot::where('_id',$record->depot)->where('deleted_at', null)->first();
            // @$depot = $depot->name;


            $data_arr[] = array(
                "id" => $id,
                "no" => $i,
                "name" => $name,
                "email" => $email,
                "subject" => $subject,
                "message" =>  substr($message, 0, 100)."....",
                "custom_field1" => $custom_field1,
                "custom_field2" => $custom_field2,
                //"image" => '<a href="/images/homepage/'.$image.'" target="_blank" >'.$image.'</a>',
                //"created_by" => $created_by,

                "date" => $date,
                "time" => $time,
                "action" =>'<div class="settings-main-icon">   <a  href="' . url('view-contact/'.$id). '" target="_blank"><i class="fa fa-eye bg-success me-1"></i></a>',
                // "time" => $time,
                // "edit" => '<div class="settings-main-icon"><a class="deleteItem" data-id="' . $id . '"><i class="fa fa-trash bg-danger "></i></a>
                //     <a  href="' . url('homepage/edit/'.$id). '" ><i class="fa fa-edit bg-info me-1"></i></a>
                //     <a  href="' . url('view-homepage/'.$id). '" ><i class="fa fa-eye bg-success me-1"></i></a>



                // </div>'



            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response);
    }

    public function contactDetails($id){
        $data=Contact::where('_id',$id)->first();
        return view('homepagecontent.contactDetails',compact('data'));
    }
}

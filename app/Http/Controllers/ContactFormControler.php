<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $contact_list = ContactForm::get();

        return view('contact-form.index',compact('contact_list'));
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
        // Validate the form data
        ContactForm::create($request->validate([
            'username' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]));

        // Process the form submission, such as saving data to the database

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = ContactForm::find($id);
    
        // Check if item is not found
        if (!$item) {
            abort(404); // or redirect to a custom error page
        }
    
        return view('contact-form.show', compact('item'));
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
    public function destroy(ContactForm $contact_form)
    {
         // Delete the contact form entry
         $contact_form->delete();

         // Redirect back with a success message
         return redirect()->back()->with('success', 'Contact form entry deleted successfully!');
    }

    
    public function getContactForm()
    {
        

        // Get DataTables parameters
        // $draw = $request->get('draw');
        // $start = $request->get("start");
        // $rowperpage = $request->get("length");

        // // Get DataTables order, columns, and search values
        // $columnIndex_arr = $request->get('order');
        // $columnName_arr = $request->get('columns');
        // $order_arr = $request->get('order');
        // $search_arr = $request->get('search');




        // Initialize variables
        $columnIndex = null;
        $columnName = null;
        $columnSortOrder = 'asc';
        $searchValue = '';

        // Check $columnIndex_arr
        if (!empty($columnIndex_arr) && is_array($columnIndex_arr) && count($columnIndex_arr) > 0) {
            $columnIndex = $columnIndex_arr[0]['column'];
        }

        // Check $columnName_arr
        if (!empty($columnName_arr) && is_array($columnName_arr) && isset($columnIndex) && isset($columnName_arr[$columnIndex]['data'])) {
            $columnName = $columnName_arr[$columnIndex]['data'];
        }

        // Check $order_arr
        if (!empty($order_arr) && is_array($order_arr) && count($order_arr) > 0) {
            $columnSortOrder = $order_arr[0]['dir'];
        }

        // Check $search_arr
        if (isset($search_arr['value'])) {
            $searchValue = $search_arr['value'];
        }

        // Initialize the query
        $query = ContactForm::query();

        // Apply search filter if provided
        if (!empty($searchValue)) {
            $query->where('title', 'like', '%' . $searchValue . '%');
        }



        // Get total records and filtered records count
        $totalRecords = $query->count();
        $totalRecordswithFilter = $query->count();

        // Fetch records with pagination and ordering
        $records = $query->when(!empty($columnName), function ($query) use ($columnName, $columnSortOrder) {
            return $query->orderBy($columnName, $columnSortOrder);
        })
            ->skip($start)
            ->take($rowperpage)
            ->get();


        

        // Build response data
        $data_arr = [];
        $i = 1;
        foreach ($records as $record) {
            $data_arr[] = [
                'no' => $i++,
                "Name" => @$record->username . $record->lastname,
                "email" => @$record->email,
                "phone" => @$record->phone,
                "company" => @$record->company,
                "subject" => @$record->subject,
                "message" => @$record->message,
                "action" => '<div class="d-flex">
                    <a class="btn btn-primary m-1" href="' . route('menus.edit', $record->id) . '">Show More</a>
                    <form action="' . route('menus.delete', $record->id) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this item?\');">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger m-1">Delete</button>
                    </form>
                </div>'
            ];
        }



        // dd($data_arr);

        // Prepare the response
        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        ];

        // Return the response as JSON
        return response()->json($response);
    }
}

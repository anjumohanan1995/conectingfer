<?php

namespace App\Http\Controllers;

use App\Models\Innovation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InnovationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $content = Innovation::first();

        return view('innovations',compact('content'));
    }



    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules for images
        ]);

        // Find the content to update
        $content = Innovation::first();
        if($content == ''){

            $innovation=   Innovation::create([
            'title' => @$request->title? $request->title:'']);
        }
        // Update the content
        $content->title = $request->input('title');
        $content->description = $request->input('description');

        // Handle file uploads
        if ($request->hasFile('images')) {
            $imageNames = [];

            // Handle file uploads
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $extension = $image->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension;
                    $image->move('innovations/', $filename);
                    $imageNames[] = $filename; // Add filename to array
                }
            }

            $content->image = $imageNames;
        }



        // Save the content after updating attributes and associating images
        $content->save();

        // Redirect back or return response
        return redirect()->back()->with('status','Content Updated Successfully.');
    }


    public function getSolutionsPage($slug)  {

        

        $content = Innovation::where('link', '/solution/' . $slug)->first();
        $content_list = Innovation::get();

        // dd($content);


        return view('pages.solutions',compact('content','content_list'));
    }
}

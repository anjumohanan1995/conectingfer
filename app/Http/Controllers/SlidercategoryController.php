<?php



namespace App\Http\Controllers;


use App\Models\SliderCategory;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;

class SlidercategoryController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {

        $categories = SliderCategory::orderBy('id','desc')->where('deleted_at',null)->get();



        return view('slider_category.index',compact('categories'));



    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('slider_category.create');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $validate = Validator::make($request->all(),
        [

            'category_name' => 'required|regex:/^[\pL\s\-]+$/u|max:250',

            'category_position' => 'required|regex:/^[a-zA-Z0-9 ]+$/',

            'category_status' => 'required|regex:/^[a-zA-Z0-9 ]+$/',

        ]);

        if ($validate->fails()) {
            return Redirect::back()->withErrors($validate);
        }


        $cat=new SliderCategory();

        $cat->category_name=$request->category_name;

        $cat->category_position=$request->category_position;

        $cat->category_status=$request->category_status;

        if($cat->save())

        {

            return redirect()->route('slidercategories.index')



                    ->with('success','category saved successfully');

        }



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

        $category=SliderCategory::find($id);

        $sliders=Slider::where('slider_category_id',$id)->get();
      
        return view('slider_category.edit',compact('category','sliders'));

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

            'category_name' => 'required|regex:/^[\pL\s\-]+$/u',

            'category_postion' => 'required',

            'category_status' => 'required',

        ]);

        if ($validate->fails()) {

            return Redirect::back()->withErrors($validate);
        }

        $slidercategory=SliderCategory::find($id);

        $slidercategory->category_name=$request->category_name??'';

        $slidercategory->category_position=$request->category_postion??'';

        $slidercategory->category_status=$request->category_status??'';

        $slidercategory->update();

        return redirect()->route('slidercategories.edit',$id)->with('success','category saved successfully');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        SliderCategory::with('Slider')->where('id',$id)->delete();

        Slider::where('slider_category_id',$id)->delete();

        return redirect()->route('slidercategories.index')



        ->with('success','Slider Category deleted successfully');

    }

}


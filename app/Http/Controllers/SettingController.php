<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Setting;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Redirect;

class SettingController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function genreal()

    {

      $env_files = [

        'APP_URL' => env('APP_URL'),

        'APP_DEBUG' => env('APP_DEBUG'),

        'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),

        'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),

        'MAIL_DRIVER' => env('MAIL_DRIVER'),

        'MAIL_HOST' => env('MAIL_HOST'),

        'MAIL_PORT' => env('MAIL_PORT'),

        'MAIL_USERNAME' => env('MAIL_USERNAME'),

        'MAIL_PASSWORD' => env('MAIL_PASSWORD'),

        'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),

        'FACEBOOK_CLIENT_ID' => env('FACEBOOK_CLIENT_ID'),

        'FACEBOOK_CLIENT_SECRET' => env('FACEBOOK_CLIENT_SECRET'),

        'FACEBOOK_CALLBACK_URL' => env('FACEBOOK_CALLBACK_URL'),

        'GOOGLE_CLIENT_ID' => env('GOOGLE_CLIENT_ID'),

        'GOOGLE_CLIENT_SECRET' => env('GOOGLE_CLIENT_SECRET'),

        'GOOGLE_CALLBACK_URL' => env('GOOGLE_CALLBACK_URL'),

        'GITLAB_CLIENT_ID' => env('GITLAB_CLIENT_ID'),

        'GITLAB_CLIENT_SECRET' => env('GITLAB_CLIENT_SECRET'),

        'GITLAB_CALLBACK_URL' => env('GITLAB_CALLBACK_URL'),

        'AMAZON_LOGIN_ID' => env('AMAZON_LOGIN_ID'),

        'AMAZON_LOGIN_SECRET' => env('AMAZON_LOGIN_SECRET'),

        'AMAZON_LOGIN_REDIRECT' => env('AMAZON_LOGIN_REDIRECT'),

        'LINKEDIN_CLIENT_ID' => env('LINKEDIN_CLIENT_ID'),

        'LINKEDIN_CLIENT_SECRET' => env('LINKEDIN_CLIENT_SECRET'),

        'LINKEDIN_CALLBACK_URL' => env('LINKEDIN_CALLBACK_URL'),

        'TWITTER_CLIENT_ID' => env('TWITTER_CLIENT_ID'),

        'TWITTER_CLIENT_SECRET' => env('TWITTER_CLIENT_SECRET'),

        'TWITTER_CALLBACK_URL' => env('TWITTER_CALLBACK_URL'),

        'FB_URL'        => env('FB_URL'),

        'TWITTER_URL'   => env('TWITTER_URL'),

        'LINKEDIN_URL'  => env('LINKEDIN_URL'),

        'WHATSAPP_URL'  => env('WHATSAPP_URL'),

      ];

      $setting = Setting::first();

      $css = @file_get_contents("css/custom-style.css");

      $js = @file_get_contents("js/custom-js.js");

      return view('setting.setting',compact('css','js','setting','env_files'));

    }



    public function store(Request $request)

    {

      return $this->extraupdate($request);

    }



    public function extraupdate($request){

        $validate = Validator::make($request->all(),
        [
            'project_title' => 'nullable|regex:/^[a-zA-Z0-9 ]+$/',
            'product_name' => 'nullable|regex:/^[a-zA-Z0-9 ]+$/',
            'default_phone' => 'nullable',
            'wel_email' => 'nullable|email',
            'APP_URL' => ['nullable', 'string', function ($attribute, $value, $fail) {
                // Check if the input contains any HTML tags or scripts
                if ($value !== strip_tags($value)) {
                    $fail('The :attribute cannot contain HTML or scripts.');
                }
            }],

        'logo' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
        'footer_logo' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
        'favicon' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
        'preloader_logo' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
    if ($validate->fails()) {

        return Redirect::back()->withErrors($validate);
    }


        $setting1 = Setting::first();

        if($setting1 == ''){
          // dd('if');
           $setting1=   Setting::create([
            'project_title' => @$request->project_title? $request->project_title:'']);
        }
        $setting = Setting::first();

        $setting->project_title = $request->project_title;

        $setting->app_url = $request->APP_URL;

        $setting->cpy_txt = $request->cpy_txt;

        $setting->wel_email = $request->wel_email;

        $setting->default_address = $request->default_address;

        $setting->default_phone = $request->default_phone;

        $setting->fb_url = $request->fb_url;
        $setting->instagram_url = $request->instagram_url;
        $setting->twitter_url = $request->twitter_url;
        $setting->linkedin_url = $request->linkedin_url;
        $setting->youtube_url = $request->youtube_url;

        $setting->footer_content = $request->footer_content;




          if($file = $request->file('logo')) {



            $name = 'logo'.uniqid() . '.' . $file->getClientOriginalExtension();



            if($setting->logo !="")

            {

                $content = @file_get_contents(public_path().'/images/logo/'.$setting->logo);



                if ($content) {

                    unlink(public_path().'/images/logo/'.$setting->logo);

                }

            }



            $file->move('images/logo', $name);

            $setting->logo = $name;
          }





          if($file = $request->file('preloader_logo')) {



             $name = 'preloader_logo'.uniqid() . '.' . $file->getClientOriginalExtension();



            if($setting->logo != null) {

              $content = @file_get_contents(public_path().'/images/logo/'.$setting->preloader_logo);

              if($content) {

                unlink(public_path().'/images/logo/'.$setting->preloader_logo);

              }

            }

            $file->move('images/logo', $name);

            $setting->preloader_logo = $name;



          }



          if($file = $request->file('footer_logo')) {



            $name = 'footer_logo'.uniqid() . '.' . $file->getClientOriginalExtension();



            if($setting->logo != null) {

              $content = @file_get_contents(public_path().'/images/logo/'.$setting->footer_logo);

              if($content) {

                unlink(public_path().'/images/logo/'.$setting->footer_logo);

              }

            }

            $file->move('images/logo', $name);

            $setting->footer_logo = $name;





            $setting->logo_type = 'L';

          }



          if($file = $request->file('favicon')) {

            $name = 'favicon'.uniqid() . '.' . $file->getClientOriginalExtension();



            if($setting->favicon != null) {

                $content = @file_get_contents(public_path().'/images/favicon/'.$setting->favicon);

                if($content) {

                  unlink(public_path().'/images/favicon/'.$setting->favicon);

                }

            }

            $file->move('images/favicon', $name);

            $setting->favicon = $name;



          }







        if(isset($request->project_logo))

        {

          $setting->logo_type = 'L';

        }

        else

        {

          $setting->logo_type = 'T';

        }
        $setting->save();

        return redirect()->route('gen.set')->with('success',trans('flash.UpdatedSuccessfully'));

    }



    public function updateMailSetting(Request $request)

    {



        $input = $request->all();

        $setting = Setting::first();



        if(config('app.demolock') == 0){



          $env_update = $this->changeEnv([

            'MAIL_FROM_NAME' => $string = preg_replace('/\s+/', '', $input['MAIL_FROM_NAME']),

            'MAIL_FROM_ADDRESS' => $input['MAIL_FROM_ADDRESS'],

            'MAIL_DRIVER' => $input['MAIL_DRIVER'],

            'MAIL_HOST' => $input['MAIL_HOST'],

            'MAIL_PORT' => $input['MAIL_PORT'],

            'MAIL_USERNAME'=> $input['MAIL_USERNAME'],

            'MAIL_PASSWORD'=> $input['MAIL_PASSWORD'],

            'MAIL_ENCRYPTION'=> $input['MAIL_ENCRYPTION']

          ]);





          if($env_update)

          {

            return back()->with('updated', trans('flash.settingssaved'));

          }

          else

          {

            return back()->with('deleted', trans('flash.settingsnotsaved'));

          }



        }

        else{

          return back()->with('delete','You can\'t update in Demo');

        }

    }



    public function updateSeo(Request $request)

    {



        $setting = Setting::first();

        $setting->meta_data_desc = $request->meta_data_desc;

        $setting->meta_data_keyword = $request->meta_data_keyword;

        $setting->google_ana = $request->google_ana;

        $setting->fb_pixel = $request->fb_pixel;



        $setting->save();

        return redirect()->route('gen.set')->with('success',trans('flash.UpdatedSuccessfully'));

    }





    public function updateSociaLink(Request $request)

    {



        $setting = Setting::first();

        $setting->fb_url       = $request->fb_url;

        $setting->twitter_url  = $request->twitter_url;

        $setting->linkedin_url = $request->linkedin_url;

        $setting->whatsapp_url = $request->whatsapp_url;

        $setting->youtube_url = $request->youtube_url;



        $setting->save();

        return redirect()->route('gen.set')->with('success',trans('flash.UpdatedSuccessfully'));

    }

    public function updatePayment(Request $request)

    {



        $setting = Setting::first();

        $setting->is_razorpay = $request->is_razorpay;
        $setting->razorpay_key = $request->razorpay_key;
        $setting->razorpay_secret = $request->razorpay_secret;
        $setting->razorpay_text = $request->razorpay_text;

        $setting->is_federalbank = $request->is_federalbank;
        $setting->federalbank_key = $request->federalbank_key;
        $setting->federalbank_secret = $request->federalbank_secret;
        $setting->federalbank_text = $request->federalbank_text;





        $setting->save();

        return redirect()->route('gen.set')->with('success',trans('flash.UpdatedSuccessfully'));

    }
    // public function razor($status)
    // {
    //     $data = Setting::findOrFail(1);
    //     $data->is_razorpay = $status;
    //     $data->update();
    // }





    public function storeCSS(Request $request)

    {





        $css = $request->css;

        file_put_contents("css/custom-style.css",$css.PHP_EOL);

        return redirect()->route('gen.set')->with('success',trans('flash.UpdatedSuccessfully'));

    }



    public function storeJS(Request $request)

    {



      $js = $request->js;

      file_put_contents("js/custom-js.js",$js.PHP_EOL);

      return redirect()->route('gen.set')->with('success',trans('flash.UpdatedSuccessfully'));

    }



    public function slfb(Request $request)

    {

       $setting = Setting::first();



        if(isset($request->fb_enable))

        {

          $setting->fb_login_enable = "1";

        }else

        {

          $setting->fb_login_enable = "0";

        }



        $env_update = $this->changeEnv([

          'FACEBOOK_CLIENT_ID' => $request->FACEBOOK_CLIENT_ID,

          'FACEBOOK_CLIENT_SECRET' => $request->FACEBOOK_CLIENT_SECRET,

          'FACEBOOK_CALLBACK_URL' => $request->FACEBOOK_CALLBACK_URL



        ]);





       $setting->save();



       return redirect()->route('gen.set')->with('success',trans('flash.UpdatedSuccessfully'));

    }



    public function slgl(Request $request)

    {

        $setting = Setting::first();



        if(isset($request->google_enable))

        {

          $setting->google_login_enable = "1";

        }else

        {

          $setting->google_login_enable = "0";

        }



        $env_update = $this->changeEnv([

          'GOOGLE_CLIENT_ID' => $request->GOOGLE_CLIENT_ID,

          'GOOGLE_CLIENT_SECRET' => $request->GOOGLE_CLIENT_SECRET,

          'GOOGLE_CALLBACK_URL' => $request->GOOGLE_CALLBACK_URL



        ]);



        $setting->save();



        return redirect()->route('gen.set')->with('success',trans('flash.UpdatedSuccessfully'));

    }



    public function slgit(Request $request)

    {

        $setting = Setting::first();



        if(isset($request->gitlab_enable))

        {

          $setting->gitlab_login_enable = "1";

        }else

        {

          $setting->gitlab_login_enable = "0";

        }



        $env_update = $this->changeEnv([

          'GITLAB_CLIENT_ID' => $request->GITLAB_CLIENT_ID,

          'GITLAB_CLIENT_SECRET' => $request->GITLAB_CLIENT_SECRET,

          'GITLAB_CALLBACK_URL' => $request->GITLAB_CALLBACK_URL



        ]);



        $setting->save();



        return redirect()->route('gen.set')->with('success',trans('flash.UpdatedSuccessfully'));

    }



    public function slamazon(Request $request)

    {

        $setting = Setting::first();



        if(isset($request->amazon_enable))

        {

          $setting->amazon_enable = "1";

        }else

        {

          $setting->amazon_enable = "0";

        }



        $env_update = $this->changeEnv([

          'AMAZON_LOGIN_ID' => $request->AMAZON_LOGIN_ID,

          'AMAZON_LOGIN_SECRET' => $request->AMAZON_LOGIN_SECRET,

          'AMAZON_LOGIN_REDIRECT' => $request->AMAZON_LOGIN_REDIRECT



        ]);



        $setting->save();



        return redirect()->route('gen.set')->with('success',trans('flash.UpdatedSuccessfully'));

    }



    public function sllinkedin(Request $request)

    {

        $setting = Setting::first();



        if(isset($request->linkedin_enable))

        {

          $setting->linkedin_enable = "1";

        }else

        {

          $setting->linkedin_enable = "0";

        }



        $env_update = $this->changeEnv([

          'LINKEDIN_CLIENT_ID' => $request->LINKEDIN_CLIENT_ID,

          'LINKEDIN_CLIENT_SECRET' => $request->LINKEDIN_CLIENT_SECRET,

          'LINKEDIN_CALLBACK_URL' => $request->LINKEDIN_CALLBACK_URL



        ]);



        $setting->save();



        return redirect()->route('gen.set')->with('success',trans('flash.UpdatedSuccessfully'));

    }



    public function sltwitter(Request $request)

    {

        $setting = Setting::first();



        if(isset($request->twitter_enable))

        {

          $setting->twitter_enable = "1";

        }else

        {

          $setting->twitter_enable = "0";

        }



        $env_update = $this->changeEnv([

          'TWITTER_CLIENT_ID' => $request->TWITTER_CLIENT_ID,

          'TWITTER_CLIENT_SECRET' => $request->TWITTER_CLIENT_SECRET,

          'TWITTER_CALLBACK_URL' => $request->TWITTER_CALLBACK_URL



        ]);



        $setting->save();



        return redirect()->route('gen.set')->with('success',trans('flash.UpdatedSuccessfully'));

    }



    protected function changeEnv($data = array()){

    {

        if ( count($data) > 0 ) {



            // Read .env-file

            $env = file_get_contents(base_path() . '/.env');



            // Split string on every " " and write into array

            $env = preg_split('/\s+/', $env);;



            // Loop through given data

            foreach((array)$data as $key => $value){

              // Loop through .env-data

              foreach($env as $env_key => $env_value){

                // Turn the value into an array and stop after the first split

                // So it's not possible to split e.g. the App-Key by accident

                $entry = explode("=", $env_value, 2);



                // Check, if new key fits the actual .env-key

                if($entry[0] == $key){

                    // If yes, overwrite it with the new one

                    $env[$env_key] = $key . "=" . $value;

                } else {

                    // If not, keep the old one

                    $env[$env_key] = $env_value;

                }

              }

            }



            // Turn the array back to an String

            $env = implode("\n\n", $env);



            // And overwrite the .env with the new data

            file_put_contents(base_path() . '/.env', $env);



            return true;



        } else {



          return false;

        }

    }

  }

}


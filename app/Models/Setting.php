<?php



namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;







class Setting extends Eloquent

{



    protected $connection = 'mongodb';

    protected $collection = 'settings';


    protected $fillable = ['logo', 'favicon', 'paytm_enable', 'project_title', 'promo_text', 'donation_link','fb_url','instagram_url','twitter_url','linkedin_url','whatsapp_url','youtube_url','app_url','default_phone','wel_email','cpy_txt','footer_logo','preloader_logo','footer_content'];



    protected $casts = [

        'ipblock' => 'array'

    ];

}


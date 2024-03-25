<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Setting extends Model

{
    use HasFactory , SoftDeletes;
    protected $collection = 'settings';


    protected $fillable = ['logo', 'favicon', 'paytm_enable', 'project_title', 'promo_text', 'donation_link','fb_url','instagram_url','twitter_url','linkedin_url','whatsapp_url','youtube_url','app_url','default_phone','wel_email','cpy_txt','footer_logo','preloader_logo','footer_content','why_choose_subtitle','why_choose_title'];



    protected $casts = [

        'ipblock' => 'array'

    ];

}


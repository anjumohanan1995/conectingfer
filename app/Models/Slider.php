<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model

{
    use HasFactory , SoftDeletes;
    protected $collection = 'sliders';

     protected $fillable = [
        'title','link','description','slider_type','image','slider_style','button_text','button_url','button_status','slider_status','slider_category_id','color','button_one_text','button_one_url','video'
    ];



}


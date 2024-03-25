<?php



namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SliderCategory extends Model

{

    use HasFactory ,SoftDeletes;

      protected $collection = 'slider_categories';


    protected $fillable = [
        'category_name','category_position','category_status'
    ];


    public function Sliders()

    {

    	return $this->hasMany('App\Models\Slider','slider_category_id');

    }

}


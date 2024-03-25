<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory, SoftDeletes; 


    protected $collection = 'sub_menus';

    protected $guarded = [];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class SubSubMenu extends Eloquent
{
    use HasFactory, SoftDeletes; 

    protected $connection = 'mongodb';
    protected $collection = 'sub_sub_menus';

    protected $guarded = [];
}

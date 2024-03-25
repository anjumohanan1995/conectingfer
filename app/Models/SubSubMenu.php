<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SubSubMenu extends Model
{
    use HasFactory, SoftDeletes; 

    protected $collection = 'sub_sub_menus';

    protected $guarded = [];
}

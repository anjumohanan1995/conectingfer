<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class MainMenu extends Model
{
    use HasFactory, SoftDeletes; 

    protected $collection = 'main_menus';

    protected $guarded = [];

}

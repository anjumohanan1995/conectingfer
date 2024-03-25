<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory , SoftDeletes;

    protected $collection = 'about_us';

    protected $guarded = [];
}

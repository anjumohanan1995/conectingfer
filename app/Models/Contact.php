<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;


class Contact extends Eloquent
{
    use HasFactory , SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'contacts';

    protected $guarded = [];
}

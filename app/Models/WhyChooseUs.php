<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class WhyChooseUs extends Model
{
    use HasFactory , SoftDeletes;

    protected $collection = 'why_choose_us';

    protected $guarded = [];
}

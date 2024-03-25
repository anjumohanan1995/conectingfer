<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class IndustrialService extends Model
{
    use HasFactory , SoftDeletes;

    protected $collection = 'industrial_services';

    protected $guarded = [];
}

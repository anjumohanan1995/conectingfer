<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory , SoftDeletes;
    protected $collection = 'contact_forms';

    protected $guarded = [];
}

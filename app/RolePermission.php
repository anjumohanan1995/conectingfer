<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use SoftDeletes;

    protected $collection = 'role_permissions';

    /**
     * The attributes which are mass assigned will be used.
     *
     * It will return @var array
     */
    protected $fillable = [
        'role','user_id','permission','sub_permissions'
    ];

}
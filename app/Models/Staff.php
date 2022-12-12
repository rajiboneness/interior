<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','email', 'phone', 'image', 'state', 'pincode', 'address', 'status'];
    protected $dates = [ 'deleted_at' ];
}

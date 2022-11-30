<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'vendor_head', 'email', 'phone', 'image', 'state', 'country', 'pincode', 'address', 'status'];
    protected $dates = [ 'deleted_at' ];
}

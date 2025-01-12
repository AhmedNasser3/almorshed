<?php

namespace App\Models\admin\test;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'description',
    ];
}
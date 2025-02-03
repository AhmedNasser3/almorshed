<?php

namespace App\Models\admin\service;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'duration'
    ];
}
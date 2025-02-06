<?php

namespace App\Models\admin\vacation;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    protected $fillable = [
        'doctor_id',
        'date_column',
        'hour'
    ];
}
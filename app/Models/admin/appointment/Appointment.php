<?php

namespace App\Models\admin\appointment;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'doctor_id',
        'start',
        'end'
    ];
}
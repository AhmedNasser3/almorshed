<?php

namespace App\Models\admin\review;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'review',
        'rating',
        'doctor_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo( User::class);
    }
}
<?php

namespace App\Models\admin\model;

use App\Models\admin\test\Test;
use Illuminate\Database\Eloquent\Model;

class Choose extends Model
{
    protected $fillable = [
        'slug',
        'test_id',
        'question',
        'choices',
    ];

    protected $casts = [
        'choices' => 'array',
    ];

    public function setChoicesAttribute($value)
    {
        $this->attributes['choices'] = json_encode($value);
    }

    public function getChoicesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
}
<?php

namespace App\Models\admin\seo;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = [
      'meta_description', 'meta_keywords'
    ];

}

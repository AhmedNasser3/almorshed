<?php

namespace App\Models\admin\tag;

use App\Models\admin\article\Article;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table =  [
        'slug',
        'article_id',
        'name',
    ];

    public function article () {
        return $this->belongsTo(Article::class);
    }
}
<?php

namespace App\Models\admin\article;

use App\Models\User;
use App\Models\admin\tag\Tag;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'meta_description',
        'image',
        'video',
        'video_link',
        'files',
        'author',
        'status',
        'view_count',
        'alt',
    ];

    public function tag(){
        return $this->belongsToMany(Tag::class, 'article_id');
    }
    public function user (){
        return $this->belongsTo(User::class, 'author');
    }

}
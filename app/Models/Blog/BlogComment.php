<?php

namespace FFTCG\Models\Blog;

use FFTCG\Models\Comments\Comment;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Comment
{
    protected $table = 'blog_comments';

    protected $fillable = [
        'blog_post_id', 'user_id', 'comment'
    ];

    public function post()
    {
        return $this->belongsTo('FFTCG\Models\Blog\BlogPost');
    }
}

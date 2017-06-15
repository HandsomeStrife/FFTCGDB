<?php

namespace FFTCG\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content', 'draft'
    ];

    public function snippet()
    {
        
    }
}

<?php

namespace FFTCG\Models\Comments;

use FFTCG\Models\Comments\Comments;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CardComment extends Comment
{
    protected $table = 'card_comments';

    protected $fillable = [
        'card_id', 'user_id', 'comment'
    ];
}

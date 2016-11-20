<?php

namespace FFTCG\Models\Likes;

use FFTCG\Models\Likes\Like;

class CardLike extends Like
{
    protected $table = 'card_likes';

    protected $fillable = [
        'card_id', 'user_id'
    ];
}

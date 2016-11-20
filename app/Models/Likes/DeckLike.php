<?php

namespace FFTCG\Models\Likes;

use FFTCG\Models\Likes\Like;

class DeckLike extends Like
{
    protected $table = 'deck_likes';

    protected $fillable = [
        'deck_id', 'user_id'
    ];
}

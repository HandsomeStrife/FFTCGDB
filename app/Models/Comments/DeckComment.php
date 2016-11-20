<?php

namespace FFTCG\Models\Comments;

use FFTCG\Models\Comments\Comments;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DeckComment extends Comment
{
    protected $table = 'deck_comments';

    protected $fillable = [
        'deck_id', 'user_id', 'comment'
    ];
}

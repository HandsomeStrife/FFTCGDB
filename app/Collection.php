<?php

namespace FFTCG;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'user_id', 'card_id', 'count', 'foil'
    ];
}

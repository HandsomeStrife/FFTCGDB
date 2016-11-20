<?php

namespace FFTCG;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DeckCard extends Model
{
    protected $table = 'deckcards';

    protected $fillable = [
        'deck_id', 'card_id', 'count'
    ];
}

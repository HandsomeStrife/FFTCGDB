<?php

namespace FFTCG;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'cost', 'element', 'type', 'job', 'category', 'text', 'card_number', 'rarity', 'power'
    ];
}

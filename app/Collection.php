<?php

namespace FFTCG;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'user_id', 'card_id', 'count', 'foil'
    ];

    public function classes()
    {
        $classes = array();
        if ($this->count > 0 || $this->foil_count > 0) {
            $classes[] = 'collected';
        } else {
            $classes[] = 'not-collected';
        }
        if ($this->trade_count > 0 || $this->foil_trade_count > 0) {
            $classes[] = 'card-for-trade';
        }
        if ($this->wanted > 0 || $this->foil_wanted > 0) {
            $classes[] = 'card-wanted';
        }
        return implode(' ', $classes);
    }
}

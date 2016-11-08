<?php

namespace FFTCG;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Deck extends Model
{
    use SoftDeletes;

    protected $_cards = false;
    protected $_author = false;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'name', 'description', 'public'
    ];

    public function cards()
    {
        if (empty(self::$_cards)) {
            $this->_cards = Card::join('deckcards', 'cards.id', '=', 'deckcards.card_id')
                    ->where('deckcards.deck_id', $this->id)
                    ->whereNull('deckcards.deleted_at')
                    ->orderBy('cards.card_number', 'ASC')
                    ->groupBy('cards.id')
                    ->get();
        }
        return $this->_cards;
    }

    public function author()
    {
        if (!$this->_author) {
            $this->_author = User::find($this->user_id)->username;
        }
        return $this->_author;
    }

    public function elements()
    {
        $el = array();
        $cards = $this->cards();
        foreach ($cards as $c) {
            if (!in_array($c->element, $el)) {
                $el[] = $c->element;
            }
        }
        return $el;
    }

    public function cardcount()
    {
        return $this->cards()->sum(function ($c) {
            return $c->count;
        });
    }

    public function checkvalid()
    {
        $count = $this->cardcount();
        if ($count !== 50) {
            return false;
        }
        return true;
    }
}

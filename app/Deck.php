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
    protected $_element_stats = false;

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

    public function snippet()
    {
        $t = implode(' ', array_slice(explode(' ', $this->description), 0, 30));
        if (strlen($t) < strlen($this->description)) {
            $t .= "...";
        }
        return $t;
    }

    public function elementStats()
    {
        if (empty($this->_element_stats)) {
            $el = array();
            $cards = $this->cards();
            // First get the element count for the cards
            foreach ($cards as $c) {
                if (!isset($el[$c->element])) {
                    $el[$c->element] = 0;
                }
                $el[$c->element] += $c->count;
            }
            // Now work out the % of each occurance
            $count = $this->cardcount();
            foreach ($el as $k => $v) {
                $el[$k] = array(
                    'percentage' => ($v / $count) * 100,
                    'count' => $v
                );
            }
            uasort($el, function ($a, $b) {
                return ($a['count'] < $b['count']);
            });
            $this->_element_stats = $el;
        }
        return $this->_element_stats;
    }
}

<?php

namespace FFTCG;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Deck extends Model
{
    use SoftDeletes;

    protected $_author = false;
    protected $_element_stats = false;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'name', 'description', 'public'
    ];

    public function cards()
    {
        return $this->belongsToMany('FFTCG\Card', 'deckcards')->withPivot('count');
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
        $cards = $this->cards;
        foreach ($cards as $c) {
            if (!isset($el[$c->element])) {
                $el[$c->element] = 0;
            } else {
                $el[$c->element]++;
            }
        }
        return $el;
    }

    public function cardcount()
    {
        return $this->cards->sum(function ($c) {
            return $c->pivot->count;
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

    public function snippet($words = 24)
    {
        $t = $this->description;
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        if (preg_match($reg_exUrl, $t, $url)) {
            // make the urls hyper links
            $t = preg_replace($reg_exUrl, "<a href='{$url[0]}'>[link]</a>", $t);
        }

        $t = implode(' ', array_slice(explode(' ', $t), 0, $words));
        if (strlen($t) < strlen($this->description)) {
            $t .= "...";
        }
        return $t;
    }

    public function chartStats()
    {
        $cards = $this->cards;
        $res = array();
        foreach ($cards as $c) {
            if (!isset($res[$c->type])) {
                $res[$c->type] = array();
            }
            if (!isset($res[$c->type][$c->element])) {
                $res[$c->type][$c->element] = 0;
            }
            $res[$c->type][$c->element]++;
        }
        return $res;
    }

    public function elementStats()
    {
        if (empty($this->_element_stats)) {
            $el = array();
            $cards = $this->cards;
            // First get the element count for the cards
            foreach ($cards as $c) {
                if (!isset($el[$c->element])) {
                    $el[$c->element] = 0;
                }
                $el[$c->element] += $c->pivot->count;
            }
            // Now work out the % of each occurance
            $count = $this->cardcount();
            foreach ($el as $k => $v) {
                $el[$k] = array(
                    'element' => $k,
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

    public function user()
    {
        return $this->belongsTo('FFTCG\User');
    }

    public function comments()
    {
        return $this->hasMany('FFTCG\Models\Comments\DeckComment');
    }

    public function likes()
    {
        return $this->belongsToMany('FFTCG\User', 'deck_likes');
    }
}

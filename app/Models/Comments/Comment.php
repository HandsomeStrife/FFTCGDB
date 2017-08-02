<?php

namespace FFTCG\Models\Comments;

use FFTCG\Card;
use FFTCG\User;
use FFTCG\Mail\Commented;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('FFTCG\User');
    }

    public function deck()
    {
        return $this->belongsTo('FFTCG\Deck');
    }

    public function format()
    {
        $c = $this->comment;
        // Replace the cards
        preg_match_all('/\(.+?\)\s{0,1}\[(.+?)\]/', $c, $cards);
        if (isset($cards[1])) {
            foreach ($cards[1] as $_c) {
                $parts = explode('-', $_c);
                $cardno = ltrim($parts[1], '0');
                $card = Card::where('set_number', $parts[0])->where('card_number', $cardno)->first();
                if ($card) {
                    $c = preg_replace('/\(.+?\)\s{0,1}\[' . $card->fullCardNumber() . '\]/', $card->hoveritem(), $c);
                }
            }
        }
        // Replace the username mentions
        $c = preg_replace('/@(\w+)/', '<a href="/u/$1">@$1</a>', $c);
        // Return
        return $c;
    }

    public function sendEmails()
    {
        Mail::to($this->deck->user)->queue(new Commented($this));
        preg_match_all('/\@(\w+)/', $this->comment, $mentions);
        if (!empty($mentions[1])) {
            foreach ($mentions[1] as $m) {
                if (!empty($m)) {
                    $user = User::where('username', $m)->first();
                    if ($user && $user->id != $deck->user->id && $user->email) {
                        Mail::to($user)->queue(new Commented($this, 'mention'));
                    }
                }
            }
        }
    }
}

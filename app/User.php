<?php

namespace FFTCG;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'country_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'username' => 'sometimes|max:20|unique:users,username,' . $this->id,
            'email' => 'required|email|max:255|unique:users,email,' . $this->id,
            'password' => 'sometimes|min:6|confirmed',
        ];
    }

    public function comments()
    {
        return $this->hasMany('FFTCG\Models\DeckComment');
    }

    public function likes()
    {
        return $this->belongsToMany('FFTCG\Deck', 'deck_likes');
    }

    public function cardComments()
    {
        return $this->hasMany('FFTCG\Models\CardComment');
    }

    public function cardLikes()
    {
        return $this->belongsToMany('FFTCG\Card', 'card_likes');
    }

    public function collection()
    {
        return $this->hasMany('FFTCG\Collection')->with('card');
    }

    public function collected()
    {
        return $this->collection->filter(function ($c) {
            return ($c->count > 0 || $c->foil_count > 0);
        });
    }

    public function fortrade()
    {
        return $this->collection->filter(function ($c) {
            return ($c->trade_count > 0 || $c->foil_trade_count > 0);
        });
    }

    public function wanted()
    {
        return $this->collection->filter(function ($c) {
            return ($c->wanted > 0 || $c->foil_wanted > 0);
        });
    }
}

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

    public function collection()
    {
        return Card::join('collections', 'cards.id', '=', 'collections.card_id')
                    ->where('collections.user_id', $this->id)
                    ->orderBy('cards.id', 'ASC')
                    ->get();
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'username' => 'sometimes|max:20|unique:users,username,' . $this->id,
            'email' => 'required|email|max:255|unique:users,email,' . $this->id,
            'password' => 'sometimes|min:6|confirmed',
        ];
    }
}

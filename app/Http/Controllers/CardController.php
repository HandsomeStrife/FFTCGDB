<?php

namespace FFTCG\Http\Controllers;

use FFTCG\User;
use FFTCG\Card;
use FFTCG\Deck;
use FFTCG\DeckCard;
use FFTCG\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CardController extends Controller
{
    public function view($card_number = '')
    {
        if (empty($card_number)) {
            return redirect()->action('HomeController@index');
        }
        if (strpos($card_number, '-') > 0) {
            $parts = explode('-', $card_number);
            $search = intval($parts[1]); // to remove the 0's
            $card = Card::where('card_number', $search)->where('set_number', $parts[0]);
        } else {
            $search = intval($card_number);
            $card = Card::where('id', $search);

        }

        $card = $card->whereNull('deleted_at')->firstOrFail();

        return view('cards.view', ['card' => $card, 'cardview' => true]);
    }

    public function edit(Request $request, $card_id)
    {
        if ($card_id == 0) {
            return view('admin.editcard');
        }
        $card = Card::findOrFail($card_id);
        if ($card) {
            View::share('card', $card);
        }
        return view('admin.editcard');
    }

    public function processEdit(Request $request, $card_id)
    {
        if (Auth::check()) {
            if ($card_id == 0) {
                $card = Card::create();
            } else {
                $card = Card::findOrFail($card_id);
            }
            $card->fill($request->all())->save();
        }
        return redirect()->back();
    }

    public function likeToggle(Request $request)
    {
        $card = Card::find($request->input('card_id'));
        if ($card && Auth::check()) {
            $user_id = Auth::user()->id;
            if ($card->likes->contains($user_id)) {
                $card->likes()->detach($user_id);
            } else {
                $card->likes()->attach($user_id);
            }
        }
    }
}

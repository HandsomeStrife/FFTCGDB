<?php

namespace FFTCG\Http\Controllers;

use FFTCG\Card;
use FFTCG\Deck;
use FFTCG\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CollectionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();
        View::share('cards', $cards);
        $collected = Collection::where('user_id', Auth::user()->id)->get()->keyBy('card_id');
        View::share('collected', $collected);
        return view('collection.index');
    }

    public function edit(Request $request, $card_id)
    {
        $card = Card::findOrFail($card_id);
        if ($card) {
            View::share('card', $card);
        }
        return view('editcard');
    }

    public function processEdit(Request $request, $card_id)
    {
        $card = Card::findOrFail($card_id);
        $card->fill($request->all())->save();
        return redirect()->back();
    }

    /**
     * Adds a card to a users collection
     *
     */
    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $card_id = $request->input('card_id');
        $type = $request->input('type');
        
        $existing = Collection::where('user_id', $user_id)->where('card_id', $card_id)->first();
        if ($type == 'add' && !$existing) {
            // They are adding a new card to their collection!
            $id = Collection::create([
                'user_id' => $user_id,
                'card_id' => $card_id,
                'count' => 1
            ]);
            return response()->json(['response' => 'Successfully added']);
        } elseif ($type == 'add' && $existing) {
            $existing->count++;
            $existing->save();
        } elseif ($type == 'remove' && $existing) {
            if ($existing->count > 1) {
                $existing->count--;
                $existing->save();
            } else {
                $existing->delete();
            }
        }
    }

    public function markFoil(Request $request)
    {
        $user_id = Auth::user()->id;
        $card_id = $request->input('card_id');
        $type = $request->input('type');

        $existing = Collection::where('user_id', $user_id)->where('card_id', $card_id)->first();
        if ($type == 'add' && !$existing) {
            $id = Collection::create([
                'user_id' => $user_id,
                'card_id' => $card_id,
                'count' => 1,
                'foil' => true
            ]);
        } elseif ($type == 'add' && !$existing->foil) {
            $existing->foil = true;
            $existing->save();
        } elseif ($type == 'remove') {
            $existing->foil = false;
            $existing->count--;
            if ($existing->count == 0) {
                $existing->delete();
            } else {
                $existing->save();
            }
        }
    }
}

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
        $collected = Auth::user()->collected()->keyBy('card_id');
        $countall = Card::get()->count();
        View::share('collected', $collected);
        return view('collection.indexalt', [ 'countall' => $countall ]);
    }

    public function profile()
    {
        $collected = Auth::user()->collected()->keyBy('card_id');
        $countall = Card::get()->count();
        return view('collection.profile', [ 'cards' => Card::all(), 'collected' => $collected, 'countall' => $countall ]);
    }

    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $existing = Auth::user()->collection->keyBy('card_id');
        $cards = $request->input('card');
        foreach ($cards as $card_id => $c) {
            $e = $existing->filter(function ($item) use ($card_id) {
                return ($item->card_id == $card_id);
            })->first();
            if (!$e) {
                $e = Collection::create([
                    'user_id' => $user_id,
                    'card_id' => $card_id,
                ]);
            }
            // Collection
            $e->count = (empty($c['count'])) ? 0 : $c['count'];
            $e->foil_count = (empty($c['foil_count'])) ? 0 : $c['foil_count'];
            // Trade
            $e->trade_count = (empty($c['trade_count'])) ? 0 : $c['trade_count'];
            $e->foil_trade_count = (empty($c['foil_trade_count'])) ? 0 : $c['foil_trade_count'];
            // Wanted
            $e->wanted = (empty($c['wanted'])) ? 0 : $c['wanted'];
            $e->foil_wanted = (empty($c['foil_wanted'])) ? 0 : $c['foil_wanted'];
            if (($e->count == 0) && ($e->foil_count == 0) && ($e->trade_count == 0) && ($e->foil_trade_count == 0) && ($e->wanted == 0) && ($e->foil_wanted == 0)) {
                $e->forceDelete();
            } else {
                $e->save();
            }
        }

        if (!$request->ajax()) {
            flash("Updated your collection!");
            return redirect()->action('CollectionController@profile');
        }
    }
}

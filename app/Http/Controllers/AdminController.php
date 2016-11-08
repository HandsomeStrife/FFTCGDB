<?php

namespace FFTCG\Http\Controllers;

use FFTCG\Card;
use FFTCG\Deck;
use FFTCG\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
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

    public function edit(Request $request, $card_id)
    {
        $card = Card::findOrFail($card_id);
        if ($card) {
            View::share('card', $card);
        }
        return view('admin.editcard');
    }

    public function processEdit(Request $request, $card_id)
    {
        if (Auth::check()) {
            $card = Card::findOrFail($card_id);
            $card->fill($request->all())->save();
        }
        return redirect()->back();
    }
}
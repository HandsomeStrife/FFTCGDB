<?php

namespace FFTCG\Http\Controllers;

use FFTCG\Card;
use FFTCG\Deck;
use FFTCG\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $public_decks = Deck::where('public', true)
                           ->orderBy('created_at', 'DESC')
                           ->limit(12)
                           ->get();
        View::share('public_decks', $public_decks);
        return view('index');
    }
}

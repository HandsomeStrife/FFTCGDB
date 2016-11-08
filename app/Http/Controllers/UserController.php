<?php

namespace FFTCG\Http\Controllers;

use FFTCG\User;
use FFTCG\Card;
use FFTCG\Deck;
use FFTCG\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserController extends Controller
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

    public function profile(Request $request, $username)
    {
        if (empty($username)) {
            return redirect()->action('HomeController@index');
        }

        $user = User::where('username', $username)->firstOrFail();
        if (!$user) {
            return redirect()->action('HomeController@index');
        }

        $decks = Deck::where('user_id', $user->id)->where('public', true)->orderBy('created_at', 'DESC')->get();

        return view('userprofile', ['cards' => $user->collection(), 'user' => $user, 'decks' => $decks]);
    }

    public function publicProfile(Request $request, $username)
    {
        if (empty($username)) {
            return redirect()->action('HomeController@index');
        }

        $user = User::where('username', $username)->firstOrFail();
        if (!$user) {
            return redirect()->action('HomeController@index');
        }

        $decks = Deck::where('user_id', $user->id)->where('public', true)->orderBy('created_at', 'DESC')->get();

        return view('user.public', ['cards' => $user->collection(), 'user' => $user, 'public_decks' => $decks, 'public_deck_title' => 'Users Public Decks']);
    }
}

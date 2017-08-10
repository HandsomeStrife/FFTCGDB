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
use Webpatser\Countries\Countries;

class UserController extends Controller
{

    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function profile()
    {
        $this->middleware('auth');
        return view('user.profile', ['user' => Auth::user(), 'countries' => Countries::all()]);
    }

    public function updateProfile(Request $request)
    {
        $this->middleware('auth');

        $user = Auth::user();
        $this->validate($request, $user->rules());
        
        $user->fill($request->all());
        $user->password = bcrypt($user->password);
        $user->save();

        flash("Updated your profile", 'success');
        
        return redirect()->action('UserController@profile');
    }

    public function publicProfile(Request $request, $username)
    {
        if (empty($username)) {
            return redirect()->action('HomeController@index');
        }

        $user = Auth::user();
        if (!$user) {
            $altuser = User::where('name', $username)->first();
            return view('errors.404', ['username' => $username, 'altuser' => $altuser]);
        }

        $countall = Card::get()->count();
	$collection = $user->collection();
        $decks = Deck::where('user_id', $user->id)
                        ->where('public', true)
                        ->orderBy('created_at', 'DESC')->get();

        return view('user.public', ['user' => $user, 'collection' => $collection, 'public_decks' => $decks, 'public_deck_title' => 'Users Public Decks', 'countall' => $countall]);
    }
}

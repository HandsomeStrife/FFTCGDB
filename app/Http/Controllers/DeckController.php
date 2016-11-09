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

class DeckController extends Controller
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

    public function index()
    {
        $this->middleware('auth');
        // Load up the users decks
        $decks = Deck::where('user_id', Auth::user()->id)
                        ->whereNull('deleted_at')
                        ->orderBy('created_at', 'DESC')
                        ->get();
        // Load up the latest public decks
        $public_decks = Deck::where('public', true)
                               ->whereNull('deleted_at')
                               ->orderBy('created_at', 'DESC')
                               ->limit(10)
                               ->get();
        return view('decks.index', ['decks' => $decks, 'public_decks' => $public_decks]);
    }

    public function publicDecks()
    {
        $public_decks = Deck::where('public', true)
                               ->whereNull('deleted_at')
                               ->orderBy('created_at', 'DESC')
                               ->paginate(15);
        return view('decks.public', ['public_decks' => $public_decks, 'public_deck_title' => 'Public Decks', 'paginate' => true]);
    }

    public function view(Request $request, $deck_id)
    {
        $deck = Deck::find($deck_id);
        $cards = $deck->cards()->keyBy('card_id');
        $author = User::find($deck->user_id);
        return view('decks.view', ['deck' => $deck, 'cards' => $cards, 'author' => $author]);
    }

    public function edit(Request $request, $deck_id)
    {
        $deck = $this->fetchDeck($deck_id);

        $all_cards = Card::all();
        $selected_cards = $deck->cards()->keyBy('card_id');

        return view('decks.add', ['deck' => $deck, 'allcards' => $all_cards, 'selectedcards' => $selected_cards]);
    }

    public function processDelete(Request $request, $deck_id)
    {
        $deck = $this->fetchDeck($deck_id);
        $deck->delete();

        flash("Deleted deck", 'success');

        return redirect()->action('DeckController@index');
    }

    public function processEdit(Request $request, $deck_id)
    {
        $deck = $this->fetchDeck($deck_id);

        // Save the deck
        $deck->name = $request->input('name');
        $deck->user_id = Auth::user()->id;
        $deck->description = $request->input('description');
        $deck->public = $request->input('public');
        $deck->save();

        // Save the cards against the deck
        DeckCard::where('deck_id', $deck->id)->delete();
        // Now save the new ones
        $cards = $request->input('card');
        if (!empty($cards)) {
            foreach ($cards as $card_id => $count) {
                DeckCard::create([
                    'deck_id' => $deck->id,
                    'card_id' => $card_id,
                    'count' => $count
                ]);
            }
        }

        if ($deck_id) {
            flash("Created new deck!", 'success');
        } else {
            flash("Updated deck!", 'success');
        }

        return redirect()->action('DeckController@index');
    }

    private function fetchDeck($deck_id)
    {
        $this->middleware('auth');

        if (!empty($deck_id)) {
            $deck = Deck::find($deck_id);
        } else {
            $deck = new Deck();
        }

        if ($deck->user_id != 0 && $deck->user_id != Auth::user()->id) {
            return redirect()->action('DeckController@index');
        }

        return $deck;
    }
}

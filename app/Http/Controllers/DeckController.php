<?php

namespace FFTCG\Http\Controllers;

use FFTCG\User;
use FFTCG\Card;
use FFTCG\Deck;
use FFTCG\DeckCard;
use FFTCG\Collection;
use FFTCG\Mail\Commented;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        // Load up the users decks
        $decks = Deck::where('user_id', Auth::user()->id)
                        ->whereNull('deleted_at')
                        ->orderBy('created_at', 'DESC')
                        ->get();
        return view('decks.index', ['decks' => $decks]);
    }

    public function publicDecks()
    {
        $public_decks = Deck::where('public', true)
                               ->whereNull('deleted_at')
                               ->orderBy('created_at', 'DESC')
                               ->paginate(15);
        return view('decks.public', ['public_decks' => $public_decks, 'public_deck_title' => 'Public Decks', 'paginate' => true]);
    }

    public function search(Request $request)
    {
        if ($request->isMethod('post')) {

            $decks = Deck::where('public', true)
                           ->withCount('comments')
                           ->withCount('likes')
                           ->whereNull('deleted_at');

            if (!empty($request->keywords)) {
                $keywords = $request->keywords;
                $decks->where(function ($query) use ($keywords) {
                    $query->orWhere('name', 'LIKE', "%{$keywords}%")
                          ->orWhere('description', 'LIKE', "%{$keywords}%");
                });
            }

            foreach ($request->elements as $el) {
                $decks->whereHas('cards', function ($query) use ($el) {
                    $query->where('element', '=', $el);
                });
            }
            foreach ($request->cards as $cid) {
                $decks->whereHas('cards', function ($query) use ($cid) {
                    $query->where('id', '=', $cid);
                });
            }

            switch ($request->order) {
                case 'comments':
                    $decks->orderBy('comments_count', 'DESC');
                    break;
                case 'likes':
                    $decks->orderBy('likes_count', 'DESC');
                    break;
                default:
                    $decks->orderBy('created_at', 'DESC');
                    break;
            }


            return view('decks.results', ['decks' => $decks->paginate(25)]);

        } else {
            $decks = Deck::where('public', true)->whereNull('deleted_at')->orderBy('created_at', 'DESC')->paginate(25);
            return view('decks.search', ['cards' => Card::all(), 'decks' => $decks]);
        }
    }

    public function view(Request $request, $deck_id)
    {
        $deck = Deck::findOrFail($deck_id);
        $author = User::findOrFail($deck->user_id);
        return view('decks.view', ['deck' => $deck, 'author' => $author]);
    }

    public function edit(Request $request, $deck_id)
    {
        $deck = $this->fetchDeck($deck_id);
        $all_cards = Card::all();
	    $collected = Auth::user()->collected->keyBy('card_id');
        $selected_cards = $deck->cards->keyBy('id');
        return view('decks.add', ['deck' => $deck, 'allcards' => $all_cards, 'selected_cards' => $selected_cards, 'collected' => $collected]);
    }

    public function processDelete(Request $request, $deck_id)
    {
        $deck = $this->fetchDeck($deck_id);
        if ($deck) {
            $deck->delete();
            flash("Deleted deck", 'success');
        } else {
            flash("Unable to delete deck - deck ID doesn't exist", 'error');
        }

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

    public function getCardDescription(Request $request)
    {
        $card = Card::find($request->input('card_id'));
        return view('decks.description', ['card' => $card]);
    }

    public function likeToggle(Request $request)
    {
        $deck = Deck::find($request->input('deck_id'));
        if ($deck && Auth::check()) {
            $user_id = Auth::user()->id;
            if ($deck->likes->contains($user_id)) {
                $deck->likes()->detach($user_id);
            } else {
                $deck->likes()->attach($user_id);
            }
        }
    }

    public function addComment(Request $request, $deck_id)
    {
        if (Auth::check()) {
            if (!empty($_POST['comment'])) {
                $deck = Deck::find($deck_id);
                $comment = $deck->comments()->create([
                    'user_id' => Auth::user()->id,
                    'comment' => $_POST['comment']
                ]);
                $comment->sendEmails();
            } else {
                flash("Please enter a comment", "danger");
            }
        }
        return redirect()->action('DeckController@view', ['deck_id' => $deck_id]);
    }

    public function delComment(Request $request, $deck_id, $comment_id)
    {
	DB::table('deck_comments')->where('id', $comment_id)->update(['deleted_at' => DB::raw('now()')]);
        return redirect()->action('DeckController@view', ['deck_id' => $deck_id]);
    }

    private function fetchDeck($deck_id)
    {
        if (!Auth::check()) {
            return redirect()->action('HomeController@index');
        }

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

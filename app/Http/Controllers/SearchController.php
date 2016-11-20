<?php

namespace FFTCG\Http\Controllers;

use FFTCG\Card;
use FFTCG\Deck;
use FFTCG\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class SearchController extends Controller
{
    protected $maps = array(
        'equal' => '=',
        'more' => '>',
        'less' => '<'
    );

    public function index()
    {
        return view('search.index');
    }

    public function search(Request $request)
    {
        // Handle the search
        $has_queries = false;
        $card = Card::select('*');
        if ($request->input('text')) {
            $has_queries = true;
            $text = $request->input('text');
            $card->where(function ($query) use ($text) {
                $query->orWhere('text', 'LIKE', "%{$text}%")
                      ->orWhere('name', 'LIKE', "%{$text}%")
                      ->orWhere('job', 'LIKE', "%{$text}%");
            });
        }
        if ($request->input('element')) {
            $has_queries = true;
            $card->whereIn('element', $request->input('element'));
        }
        if ($request->input('types')) {
            $has_queries = true;
            $card->whereIn('type', $request->input('types'));
        }
        if ($request->input('power')) {
            $has_queries = true;
            $card->where('power', $this->maps[$request->input('power_search_type')], $request->input('power'));
        }
        if ($request->input('category')) {
            $has_queries = true;
            $card->where(function ($query) use ($request) {
                foreach ($request->input('category') as $t) {
                    $query->orWhere('category', 'REGEXP', "[[:<:]]{$t}[[:>:]]");
                }
            });
        }
        if ($request->input('rarity')) {
            $has_queries = true;
            $card->whereIn('rarity', $request->input('rarity'));
        }
        if ($request->input('traits')) {
            $has_queries = true;
            $card->where(function ($query) use ($request) {
                foreach ($request->input('traits') as $t) {
                    $query->orWhere('text', 'REGEXP', "[[:<:]]{$t}[[:>:]]");
                }
            });
        }

        if ($has_queries) {
            return response()->json($card->get());
        }

        return response()->json([ 'noq' => true ]);
    }

    public function json()
    {
        return Card::all()->toJson();
    }
}

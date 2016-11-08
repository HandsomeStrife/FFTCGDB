@extends('layouts.app')

@section('content')
<div class="container">
    @if (!$deck->public && $deck->user_id != Auth::user()->id)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>This deck is private!</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>{{ $deck->name }} @if ($author->id == $deck->user_id) <span class='edit'><a href="/decks/{{ $deck->id }}/edit">Edit</a></span> @endif</h4>
                        <h6 class='author'>
                        Author: <a href="/u/{{ $author->username }}">{{ $author->username }}</a>
                        |
                        Card Count: {{ $deck->cardcount() }} 
                            @if (!$deck->checkvalid()) 
                                <span title="Invalid deck size - 50 cards exactly needed" alt="Invalid deck size - 50 cards exactly needed" class="label label-warning">Invalid Deck Size</span>
                            @endif
                        </h6>
                        <p>{{ nl2br($deck->description) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class='title'><strong>Forwards ({{ $cards->sum(function ($c) { if ($c->type == 'forward') { return $c->count; } }) }})</strong></div>
                                <ul class='card-list'>
                                    @foreach ($cards as $card)
                                        @if ($card->type == 'forward')
                                            <li>
                                                <a class='js-view-full' href="/img/cards/original/{{ $card->card_number }}.png">{{ $card->name }}</a> (<span>{{ $card->count }}</span>)
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <div class='title'><strong>Backups ({{ $cards->sum(function ($c) { if ($c->type == 'backup') { return $c->count; } }) }})</strong></div>
                                <ul class='card-list'>
                                    @foreach ($cards as $card)
                                        @if ($card->type == 'backup')
                                            <li>
                                                <a class='js-view-full' href="/img/cards/original/{{ $card->card_number }}.png">{{ $card->name }}</a> (<span>{{ $card->count }}</span>)
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <div class='title'><strong>Summons ({{ $cards->sum(function ($c) { if ($c->type == 'summon') { return $c->count; } }) }})</strong></div>
                                <ul class='card-list'>
                                    @foreach ($cards as $card)
                                        @if ($card->type == 'summon')
                                            <li>
                                                <a class='js-view-full' href="/img/cards/original/{{ $card->card_number }}.png">{{ $card->name }}</a> (<span>{{ $card->count }}</span>)
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class='isotope'>
                            @forelse ($cards as $card)
                                <div class='card collected element-{{ $card->element }}' data-card-id="{{ $card->id }}">
                                    <div class='card-image @if ($card->foil) has-foil @else no-foil @endif'>
                                        <a class='js-view-full' href="/img/cards/original/{{ $card->card_number }}.png">
                                            <img class="lazy img" data-original="/img/cards/100x140/{{ $card->card_number }}.png" width="100" height="140" src=""/>
                                        </a>
                                        <div class='card-count'>{{ $card->count }}</div>
                                    </div>
                                    <div class='card-number'>1-{{ str_pad($card->card_number, 3, 0, STR_PAD_LEFT) }}-{{$card->rarity}}</div>
                                </div>
                            @empty
                                <p>There are no cards in this deck :\</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    @endif
</div>
@endsection
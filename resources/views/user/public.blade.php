@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ $user->name }}</h1>
                    <p>{{ $cards->count() }} cards of 216 collected.</p>
                </div>
                <div class="panel-body">
                    @if (isset($cards))
                        @if ($cards->count() > 0)
                            <h4>Collection @include('shared.filters.elements')</h4>
                            <div class='isotope'>
                                @foreach ($cards as $card)
                                    <div class='card collected element-{{ $card->element }}' data-card-id="{{ $card->id }}">
                                        <div class='card-image @if ($card->foil) has-foil @else no-foil @endif'>
                                            <img class="lazy img" data-original="/img/cards/100x140/{{ $card->card_number }}.png" width="100" height="140" src=""/>
                                            <div class='card-count'>{{ $card->count }}</div>
                                            <div title='Mark foil' class='foil-card'>@if ($card->foil) F @else NF @endif</div>
                                        </div>
                                        <div class='card-number'>1-{{ str_pad($card->card_number, 3, 0, STR_PAD_LEFT) }}-{{$card->rarity}}</div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>This user hasn't collected any cards yet!</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('shared.publicdecks')
        </div>
    </div>
</div>
@endsection
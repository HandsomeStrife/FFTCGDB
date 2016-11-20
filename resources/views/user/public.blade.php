@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 style="margin-top: 0;">{{ $user->name }}</h1>
                    <p>{{ $user->collected()->count() }} cards of 216 collected.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Cards for Trade</h4>
                </div>
                <div class="panel-body">
                    <ul class='card-list'>
                        @forelse ($user->fortrade() as $card)
                            @include('shared.carditem')
                        @empty
                            <p>No cards for trade</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Cards Wanted</h4>
                </div>
                <div class="panel-body">
                    <ul class='card-list'>
                        @forelse ($user->wanted() as $card)
                            @include('shared.carditemwant')
                        @empty
                            <p>No cards wanted</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (isset($cards))
                        @if ($cards->count() > 0)
                            <h4>Collection @include('shared.filters.elements')</h4>
                            <div class='isotope'>
                                @foreach ($cards as $card)
                                    @if ($card->count > 0)
                                        <div class='card collected element-{{ $card->element }}' data-card-id="{{ $card->id }}">
                                            <div class='card-image @if ($card->foil_count > 0) has-foil @else no-foil @endif'>
                                                <img class="lazy img" data-original="/img/cards/100x140/{{ $card->card_number }}.png" width="100" height="140" src=""/>
                                                <div title='Regular' class='card-count'>{{ $card->count }}</div>
                                                <div title='Foil' class='foil-card'>@if ($card->foil_count > 0) {{ $card->foil_count }} @else 0 @endif</div>
                                            </div>
                                            <div class='card-number'>1-{{ str_pad($card->card_number, 3, 0, STR_PAD_LEFT) }}-{{$card->rarity}}</div>
                                        </div>
                                    @endif
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
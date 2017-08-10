@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 style="margin-top: 0;">{{ $user->name }}</h1>
                    <p>{{ $user->collected->count() }} cards of {{ $countall }} collected.</p>
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
                        @forelse ($user->fortrade as $collect)
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
                        @forelse ($user->wanted as $collect)
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
                    @if ($user->collected->count() > 0)
                        <h4>Collection @include('shared.filters.elements')</h4>
                        <div class='isotope'>
                            @foreach ($user->collected as $collect)
                                <div class='card collected element-{{ $collect->card->element }}' data-card-id="{{ $collect->card->id }}">
                                    <div class='card-image @if ($collect->foil_count > 0) has-foil @else no-foil @endif'>
                                        <a class='js-view-full' href="/img/cards/original/{{ $collect->card->set_number }}/{{ $collect->card->card_number }}.png">
                                            <img class="lazy img" data-original="/img/cards/100x140/{{ $collect->card->set_number }}/{{ $collect->card->card_number }}.png" width="100" height="140" src=""/>
                                            <div title='Regular' class='card-count'>{{ $collect->count }}</div>
                                            <div title='Foil' class='foil-card'>@if ($collect->foil_count > 0) {{ $collect->foil_count }} @else 0 @endif</div>
                                        </a>
                                    </div>
                                    <div class='card-number'>{{ $collect->card->fullCardNumber() }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>This user hasn't collected any cards yet!</p>
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

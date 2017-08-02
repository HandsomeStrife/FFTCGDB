@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                @if (!Auth::check())
                    <div class="panel-heading"><h3>Hi there!</h3></div>
                    <div class="panel-body">
                        <p>Welcome to the FF TCG DB! Here you can keep a track of your card collection, create your own decks and explore others that people have made. You can also make use of the search facilities to find cards quickly, and also mark cards that you wish to put up for trade!</p>
                        <p>If you'd like to add new features or contribute to the development of the site, you can do so here: <a href="https://github.com/danives/FFTCGDB/">https://github.com/danives/FFTCGDB/</a></p>
                    </div>
                @else
                    <div class="panel-heading">
                        <h4>Opus III!</h4>
                    </div>
                    <div class="panel-body">
                        <p>Opus III is live on the site! Woop Woop!</p>
                        <p>Mega props to Nick Fraker for his contributions to the site codebase and the cards, making it better and fixing some of my silly mistakes.</p>
                        <p>If you'd like to add new features or contribute to the development of the site, you can do so here: <a href="https://github.com/danives/FFTCGDB/">https://github.com/danives/FFTCGDB/</a></p>
                        <p>As usual, if you have any feedback or comments on the site, please send me a direct message on here, or get in touch with me on my twitter account <a href="//twitter.com/thedanives">@thedanives</a>.</p>
                    </div>
                @endif
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
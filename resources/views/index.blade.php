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
                    </div>
                @else
                    <div class="panel-heading">
                        <h4>An Update!</h4>
                    </div>
                    <div class="panel-body">
                        <p>It's been a while since I've updated the site - apologies on that. Day job and other commitments have kept me busy. As such, updates aren't coming to the site as frequently as I'd like, but I have a few in the pipeline.</p>
                        <p>For now, I've managed to upload all of Opus 2, along with the promo cards, as people have requested.</p>
                        <p>If you have any feedback or comments on the site, please send me a direct message on here, or get in touch with me on my twitter account <a href="//twitter.com/thedanives">@thedanives</a>.</p>
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
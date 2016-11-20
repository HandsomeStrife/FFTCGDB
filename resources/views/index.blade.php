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
                        <h4>Competition Time!</h4>
                    </div>
                    <div class="panel-body">
                        <p>Hey guys!</p>
                        <p>We've just hit 200 users, so to celebrate (and partially as an apology for continually breaking the site) I thought I'd run a small competition which works nicely with the new "like" buttons I've just added.</p>
                        <p>On the 10th of December, I will send 6 booster packs to whichever user the <strong>most liked deck</strong> belongs to. Second place will recieve 3 boosters, and third place will recieve 2 boosters.</p>
                        <p>As such, I encourage you to create and post new decks, along with sharing them with the community to get feedback. Comments on decks will be coming very very very soon (hopefully tonight), so with that in mind you should be able to create the best decks out there!</p>
                        <p>If you have any feedback or comments on the site, please send me a direct message on here, or get in touch with me on my twitter account <a href="//twitter.com/thedanives">@thedanives</a>. New features will be coming very soon, including card comments, email alerts and trade tracking!</p>
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
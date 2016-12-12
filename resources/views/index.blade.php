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
                        <p>Happy holidays!</p>
                        <p>The winners of the competition were picked on the 10th of December, and they are as follows:</p>
                        <ul>
                            <li>In first place is Rednaxel, for their deck '<a href="http://fftcgdb.com/d/481">Blazing Tornado</a>'</li>
                            <li>In second place is Riothebeast, for their deck '<a href="http://fftcgdb.com/d/225">golbez takes the stage</a>'</li>
                            <li>In third place is Seagullfeeder, for their deck '<a href="http://fftcgdb.com/d/193">Golbez</a>'</li>
                        </ul>
                        <p>I'll be in touch with you all individually to arrange delivery of your prizes, congratulations guys! I hope to run a new competition in the new year, perhaps on a different merit.</p>
                        <p>Apologies for the lack of communication and updates on the site, I've been really busy of late, but I hope to implement some new features over the holidays.</p>
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
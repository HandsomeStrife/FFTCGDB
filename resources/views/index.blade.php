@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                @if (!Auth::check())
                    <div class="panel-heading"><h3>Welcome!</h3></div>
                    <div class="panel-body">
                        <p>This site will allow you to keep a track of your Final Fantasy Trading Card Collection - what cards you do and don't have, along with creating custom decks that can be public or private.</p>
                        <p>Please register to start tracking your collection now, along with building decks. More features coming very soon :)</p>
                    </div>
                @else
                    <div class="panel-heading">
                        <h4>Welcome Back!</h4>
                    </div>
                    <div class="panel-body">
                        A feature dashboard is coming soon - to check your collection, or create a deck, please use the links in the navigation above
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
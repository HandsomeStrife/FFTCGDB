@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/decks/0/edit" class='btn btn-default pull-right'>Add Deck</a>
                    <h3 style="margin-top: 8px;">Your Decks</h3>
                    <div class='clearfix'></div>
                </div>
                <div class="panel-body">
                    @if ($decks->count() > 0)
                        @foreach ($decks as $deck)
                            <div class='deck-row-layout'>
                                <h4>
                                    <a href="/d/{{ $deck->id }}">{{ $deck->name }}</a>
                                    <span class='elements'>@foreach ($deck->elements() as $el) <img title="{{$el}}" alt="{{$el}}" height="12" width="12" src="/img/icons/{{$el}}.png"/> @endforeach</span>
                                </h4>
                                <h6>
                                    Created on {{ date('F d, Y', strtotime($deck->created_at)) }} | <a href="/decks/{{ $deck->id }}/edit">Edit</a>
                                    @if (!$deck->checkvalid()) 
                                        | <span title="Invalid deck size - 50 cards exactly needed" alt="Invalid deck size - 50 cards exactly needed" class="label label-warning label-small">Invalid Deck Size</span>
                                    @endif
                                </h6>
                                <p>@if (empty($deck->description)) << No Description >> @else {{ $deck->description }} @endif</p>
                            </div>
                        @endforeach
                    @else
                        <p>You haven't made any decks yet!</p>
                    @endif
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
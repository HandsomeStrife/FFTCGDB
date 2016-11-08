@if (isset($public_decks))
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 style="margin-top: 8px;">{{$public_deck_title or "Latest 10 Public Decks"}}</h3>
        </div>
        <div class="panel-body">
            @if ($public_decks->count() > 0)

                @foreach ($public_decks as $deck)
                    <div class='deck-row-layout'>
                        <h4>
                            <a href="/d/{{ $deck->id }}">{{ $deck->name }}</a>
                            <span class='elements'>@foreach ($deck->elements() as $el) <img title="{{$el}}" alt="{{$el}}" height="12" width="12" src="/img/icons/{{$el}}.png"/> @endforeach</span>
                        </h4>
                        <h6>
                            Created by <a href="/u/{{ $deck->author() }}">{{ $deck->author() }}</a>
                            @if (!$deck->checkvalid()) 
                            | <span title="Invalid deck size - 50 cards exactly needed. {{ $deck->cardcount() }} in deck." alt="Invalid deck size - 50 cards exactly needed  {{ $deck->cardcount() }} in deck." class="label label-warning label-small">Invalid Deck Size</span>
                            @endif
                        </h6>
                        <p>@if (empty($deck->description)) << No Description >> @else {{ $deck->description }} @endif</p>
                    </div>
                @endforeach

            @else
                <p>No public decks yet!</p>
            @endif
        </div>
    </div>
@endif
@if ($decks->count() == 0 && $decks->current_page <= $decks->last_page)
    <div class="panel-body">
        <p>No decks found</p>
    </div>
@elseif ($decks->count() != 0)
    @if ($decks->currentPage() == 1)
    <div class="panel-heading">
        <p style="margin: 0; text-align: right; font-size: 11px; font-style: italic;">Showing {{ $decks->total() }} results</p>
    </div>
    <div class="panel-body">
        <div id="deck-search-results">
        @endif
        <table class='table'>
            @foreach ($decks as $deck)
                <tr class='deck-search-list-item'>
                    <td>
                        <div class='inner-container'>
                            <div class='elements'>@foreach ($deck->elementStats() as $el => $i) <img title="{{$el}}" alt="{{$el}}" height="20" width="20" src="/img/icons/{{$el}}.png"/> @endforeach</div>
                            <h5><a href="/d/{{ $deck->id }}">{{ $deck->name }}</a></h5>
                            <h6>
                                Created by <a href="/u/{{ $deck->author() }}">{{ $deck->author() }}</a>
                                @if (!$deck->checkvalid()) 
                                | <span title="Invalid deck size - 50 cards exactly needed. {{ $deck->cardcount() }} in deck." alt="Invalid deck size - 50 cards exactly needed  {{ $deck->cardcount() }} in deck." class="label label-warning label-small">Invalid Deck Size</span>
                                @else
                                <div class='like-button'><i class="fa fa-heart" aria-hidden="true"></i> <span>{{ $deck->likes->count() }}</span>
                                <div class='comments-button'><i class="fa fa-comment-o" aria-hidden="true"></i> {{ $deck->comments->count() }}</span>
                                @endif
                            </h6>
                            <p>@if (empty($deck->description)) << No Description >> @else {!! $deck->snippet(42) !!} @endif</p>
                            <div class='percentage-bar'>
                                @foreach ($deck->elementStats() as $el => $i)<span title="{{ number_format($i['percentage'], 2) }}% {{ ucfirst($el) }} ({{ $i['count'] }} cards)" class="{{ $el }}-percentage-bar" style="width: {{ $i['percentage'] }}%;"></span>@endforeach
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    @if ($decks->currentPage() == 1)
        </div>
        @if ($decks->total() > 25)
        <div class='deck-list-loading'>
            <img src='/img/tonberry.gif' />
        </div>
        @endif
    </div>
    @endif
@endif
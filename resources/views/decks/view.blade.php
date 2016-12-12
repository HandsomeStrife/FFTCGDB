@extends('layouts.app')

@section('content')
<div class="container">
    @if (!$deck->public && (!Auth::check() || $deck->user_id != Auth::user()->id))
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>This deck is private!</p>
                    </div>
                </div>
            </div>
        </div>
    @elseif (isset($deck) && !empty($deck))
        <div class="row">
            <div class="col-md-12 deck-options-menu">
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-default js-like like-button">
                        <i class="fa @if (Auth::check() && $deck->likes->contains(Auth::user()->id)) fa-heart @else fa-heart-o @endif" aria-hidden="true"></i>
                        <span>{{ $deck->likes->count() }}</span>
                    </button>
                    <button type="button" class="js-to-comments btn btn-default">
                        <i class="fa fa-comment-o" aria-hidden="true"></i> {{ $deck->comments->count() }}
                    </button>
                </div>
                <div class="btn-group js-list-switch pull-right" role="group" aria-label="...">
                    <button type="button" class="btn btn-default selected">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn btn-default">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>{{ $deck->name }} @if (Auth::user() && Auth::user()->id == $deck->user_id) <span class='edit'><a href="/decks/{{ $deck->id }}/edit">Edit</a></span> @endif</h4>
                        <h6 class='author'>
                        Author: <a href="/u/{{ $author->username }}">{{ $author->username }}</a>
                        |
                        Card Count: {{ $deck->cardcount() }} 
                            @if (!$deck->checkvalid()) 
                                <span title="Invalid deck size - 50 cards exactly needed" alt="Invalid deck size - 50 cards exactly needed" class="label label-warning">Invalid Deck Size</span>
                            @endif
                        </h6>
                        <p>{!! nl2br(e($deck->description)) !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="card-list-section">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class='title'><strong>Forwards @if (!empty($deck->cards)) ({{ $deck->cards->sum(function ($c) { if ($c->type == 'forward') { return $c->pivot->count; } }) }}) @else (0) @endif</strong></div>
                                    <ul class='card-list'>
                                        @forelse ($deck->cards as $card)
                                            @if ($card->type == 'forward')
                                                @include('shared.listcarditem')
                                            @endif
                                        @empty
                                            <!-- Empty -->
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <div class='title'><strong>Backups @if (!empty($deck->cards)) ({{ $deck->cards->sum(function ($c) { if ($c->type == 'backup') { return $c->pivot->count; } }) }}) @else (0) @endif</strong></div>
                                    <ul class='card-list'>
                                        @forelse ($deck->cards as $card)
                                            @if ($card->type == 'backup')
                                                @include('shared.listcarditem')
                                            @endif
                                        @empty
                                            <!-- Empty -->
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <div class='title'><strong>Summons  @if (!empty($deck->cards)) ({{ $deck->cards->sum(function ($c) { if ($c->type == 'summon') { return $c->pivot->count; } }) }}) @else (0) @endif</strong></div>
                                    <ul class='card-list'>
                                        @forelse ($deck->cards as $card)
                                            @if ($card->type == 'summon')
                                               @include('shared.listcarditem')
                                            @endif
                                        @empty
                                            <!-- Empty -->
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-list-section" style="display: none;">
                        <div class="panel-body isotope">
                            @forelse ($deck->cards as $card)
                                <div class='card collected element-{{ $card->element }}' data-card-id="{{ $card->id }}">
                                    <div class='card-image @if ($card->foil) has-foil @else no-foil @endif'>
                                        <a class='js-view-full' href="/img/cards/original/{{ $card->card_number }}.png">
                                            <img class="lazy img" data-original="/img/cards/100x140/{{ $card->card_number }}.png" width="100" height="140" src=""/>
                                        </a>
                                        <div class='card-count'>{{ $card->pivot->count }}</div>
                                    </div>
                                    <div class='card-number'>1-{{ str_pad($card->card_number, 3, 0, STR_PAD_LEFT) }}-{{$card->rarity}}</div>
                                </div>
                            @empty
                                <p>There are no cards in this deck :\</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                @if (!Auth::check())
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>You must be logged in to post a comment.</p>
                        </div>
                    </div>
                @else
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="{{ action('DeckController@addComment', ['deck_id' => $deck->id]) }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea id="add-comment-textarea" class="form-control" rows="3" name="comment" placeholder="Please enter your comment here. Type @ to mention users, and # to mention cards"></textarea>
                                </div>
                                <input class='btn btn-primary pull-right' type="submit" value="Add Comment" />
                            </form>
                        </div>
                    </div>
                @endif

                <div id="deck-comment-section">
                    @forelse ($deck->comments as $comment)
                        <div class="comment-item panel panel-default">
                            <div class="panel-body">
                                {!! $comment->format() !!}
                            </div>
                            <div class="panel-footer">
                                <p>{{ $comment->created_at->diffForHumans() }} by <a href="/u/{{ $comment->user->username }}">{{ $comment->user->username }}</a></p>
                            </div>
                        </div>
                    @empty
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <strong>No comments added yet</strong>
                            </div>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
 
        @section('scripts')
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.7.3/jquery.textcomplete.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                @if (Auth::check())
                    $('.js-like').click(function() {
                        $.post('/d/like', { deck_id: {{$deck->id}} }, function() {
                            // 
                        });
                        var i = $(this).find('i');
                        var count = $(this).find('span');
                        var num = parseInt(count.text());
                        if (i.hasClass('fa-heart-o')) {
                            count.text(num+1);
                        } else {
                            count.text(num-1);
                        }
                        i.toggleClass('fa-heart-o fa-heart');
                    });
                    $('#add-comment-textarea').textcomplete([{
                        id: 'name',
                        match: /(^|\s)#(\w*)$/,
                        search: function (term, callback) {
                            $.post('/search', { 'text' : term }).done(function(resp) {
                                callback(resp); // `resp` must be an Array
                            }).fail(function () {
                                callback([]); // Callback must be invoked even if something went wrong.
                            });
                        },
                        template: function (card) {
                            if (!card.name) {
                                return 'Start typing the card name';
                            }
                            return "<img height='40' src='/img/cards/100x140/" + card.card_number + ".png'/> " + card.name + " " + generateCardNumber(card);
                        },
                        replace: function (card) {
                            return "(" + card.name + ") " + generateCardNumber(card);
                        }
                    }]);

                    function generateCardNumber(card) {
                        return "[1-" + ('000' + card.card_number).substring(card.card_number.length) + "-" + card.rarity + "]";
                    }

                @endif

                $cardlists = $('.card-list-section');
                $buttons = $('.js-list-switch button');
                $buttons.click(function() {
                    $cardlists.hide().eq($buttons.index(this)).show();
                    $buttons.removeClass('selected');
                    $(this).addClass('selected');
                    $('.isotope').isotope('layout');
                    setTimeout(function() {
                        $(window).trigger('scroll');
                    }, 600);
                });

                $('.js-to-comments').click(function() {
                    $(window).scrollTo('#deck-comment-section', 800);
                });
            });
        </script>
        @endsection
    
    @else

        <p>Unable to find the deck you're trying to access!</p>

    @endif
</div>
@endsection
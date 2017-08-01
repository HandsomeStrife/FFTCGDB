@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @if (!isset($deck))
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>Oops! Looks like you're trying to edit a deck that doesn't exist, or you don't have permission to edit.</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-4">
                    <form id="delete-deck" method="post" action="/decks/u/{{ $deck->id }}/delete">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <form id="deckbuilder-form" method="post">
                        {{ csrf_field() }}
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="name">Deck Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Deck Name" value="{{$deck->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="5" class="form-control" id="description" name="description">{{ $deck->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description">Public / Private</label>
                                    <select class="form-control" name="public">
                                        <option value="1" @if ($deck->public) selected="selected" @endif>Public</option>
                                        <option value="0" @if (!$deck->public) selected="selected" @endif>Private</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class='js-forward'>
                                    <div class='title'><strong>Forwards (<span>0</span>)</strong></div>
                                    <ul class='card-list'>
                                        @foreach ($deck->cards as $card)
                                            @if ($card->type == 'forward')
                                                <input class="js-card-{{ $card->id }}" type="hidden" name="card[{{ $card->id }}]" value="{{ $card->pivot->count }}"/>
                                                <li class="js-card-{{ $card->id }} img-instead">
                                                    <img src="/img/icons/{{ $card->element }}.png"/>
                                                    <a class='js-view-full' href="/img/cards/original/{{ $card->set_number }}/{{ $card->card_number }}.png">{{ $card->name }}</a> (<span>{{ $card->pivot->count }}</span>)
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class='js-backup'>
                                    <div class='title'><strong>Backups (<span>0</span>)</strong></div>
                                    <ul class='card-list'>
                                        @foreach ($deck->cards as $card)
                                            @if ($card->type == 'backup')
                                                <input class="js-card-{{ $card->id }}" type="hidden" name="card[{{ $card->id }}]" value="{{ $card->pivot->count }}"/>
                                                <li class="js-card-{{ $card->id }} img-instead">
                                                    <img src="/img/icons/{{ $card->element }}.png"/>
                                                    <a class='js-view-full' href="/img/cards/original/{{ $card->set_number }}/{{ $card->card_number }}.png">{{ $card->name }}</a> (<span>{{ $card->pivot->count }}</span>)
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class='js-summon'>
                                    <div class='title'><strong>Summons (<span>0</span>)</strong></div>
                                    <ul class='card-list'>
                                        @foreach ($deck->cards as $card)
                                            @if ($card->type == 'summon')
                                                <input class="js-card-{{ $card->id }}" type="hidden" name="card[{{ $card->id }}]" value="{{ $card->pivot->count }}"/>
                                                <li class="js-card-{{ $card->id }} img-instead">
                                                    <img src="/img/icons/{{ $card->element }}.png"/>
                                                    <a class='js-view-full' href="/img/cards/original/{{ $card->set_number }}/{{ $card->card_number }}.png">{{ $card->name }}</a> (<span>{{ $card->pivot->count }}</span>)
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading deckbuilder-filters">
                            @include('shared.filters.name')
                            @include('shared.filters.collected')
                            @include('shared.filters.elements')
                            <div class='clearfix'></div>
                        </div>
                        <div class="panel-body isotope">
                            @forelse ($allcards as $card)
                                <div class='card element-{{ $card->element }} @if ($collected->contains('card_id', $card->id)) collected @endif' data-card-id="{{ $card->id }}" data-title="{{ $card->name }}" data-type="{{ $card->type }}" data-number="{{ $card->card_number }}" data-set-number="{{ $card->set_number }}" data-element="{{ $card->element }}">
                                    <div class='card-image'>
                                        <img class="lazy img" data-original="/img/cards/100x140/{{ $card->set_number }}/{{ $card->card_number }}.png" width="100" height="140" src=""/>
                                        <div class='actions'>
                                            
                                            <a class='js-add-card add-card-button' href="#">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>

                                            <a class='js-view-full view-full-button' href="/img/cards/original/{{ $card->set_number }}/{{ $card->card_number }}.png">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>

                                            <a class='js-remove-card remove-card-button' href="#">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-minus fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>

                                        </div>
                                        <div class='card-count'>@if ($deck->cards->contains('id', $card->id)) {{ $selected_cards[$card->id]->pivot->count }} @else 0 @endif</div>
                                    </div>
                                    <div class='card-number'>{{$card->set_number}}-{{ str_pad($card->card_number, 3, 0, STR_PAD_LEFT) }}-{{$card->rarity}}</div>
                                </div>

                                @section('scripts')
                                <script id="js-template" type="text/plain">
                                    <input class="js-card-%card_id%" type="hidden" name="card[%card_id%]" value="%count%"/>
                                    <li class="js-card-%card_id%">
                                        <img src="/img/icons/%element%.png"/>
                                        <a class='js-view-full' href="/img/cards/original/%set_number%/%card_number%.png">%title%</a> (<span>%count%</span>)
                                    </li>
                                </script>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('.js-add-card').click(function(event) {
                                            event.preventDefault ? event.preventDefault() : (event.returnValue = false);
                                            var $card = $(this).parents('.card');
                                            var card_id = $card.attr('data-card-id');
                                            count_updated($card, 1);
                                        });
                                        
                                        $('.js-remove-card').click(function(event) {
                                            event.preventDefault ? event.preventDefault() : (event.returnValue = false);
                                            var $card = $(this).parents('.card');
                                            var card_id = $card.attr('data-card-id');
                                            count_updated($card, -1);
                                        });

                                        var $form = $('#deckbuilder-form');
                                        var $template = $('#js-template');
                                        
                                        function count_updated($card, num) {
                                            // Update the card count
                                            var count = parseInt($card.find('.card-count').text()) + num;
                                            if (count > 3) {
                                                alert("Sorry, no more than 3 of the same cards in a deck!");
                                                return;
                                            } else if (count < 0) {
                                                // Do nothing
                                                return;
                                            }

                                            $card.find('.card-count').text(count);
                                            // Update the sidebar
                                            var type = $card.attr('data-type');
                                            var card_id = $card.attr('data-card-id');
                                            var $container = $('.js-' + type + ' .card-list');
                                            var input = $form.find('.js-card-' + card_id);
                                            
                                            if (!input.length) {
                                                // We're adding a new one
                                                var content = $template.html();
                                                content = content.replace(/%card_id%/g, card_id)
                                                                .replace(/%count%/g, count)
                                                                .replace(/%element%/g, $card.attr('data-element'))
                                                                .replace(/%set_number%/g, $card.attr('data-set-number'))
                                                                .replace(/%card_number%/g, $card.attr('data-number'))
                                                                .replace(/%title%/g, $card.attr('data-title'));
                                                $container.append(content);
                                                // Attach the viewer
                                                $('.js-view-full').not('.view-full-attached').magnificPopup({
                                                    type: 'image'
                                                }).addClass('view-full-attached');

                                            } else if (input.length && count < 1) {
                                                // Remove the inputs altogether
                                                input.remove();
                                            } else {
                                                // Update the inputs
                                                input.filter('input').val(count);
                                                input.filter('li').find('span').text(count);
                                            }

                                            updateSidebar();
                                        }

                                        function updateSidebar() {
                                            // Update the sidebar individual headers
                                            $form.find('ul').each(function() {
                                                var count = 0;
                                                $(this).find('input').each(function() {
                                                    count += parseInt($(this).val());
                                                });
                                                $(this).prev().find('span').text(count);
                                            });
                                        }

                                        $('#delete-deck').on('submit', function(event) {
                                            if (!confirm("Are you sure you wish to delete the deck?")) {
                                                event.preventDefault ? event.preventDefault() : (event.returnValue = false);
                                                return false;
                                            }
                                        });

                                        updateSidebar();
                                    });
                                </script>
                                @endsection

                            @empty
                                <p>No cards in the database, uhoh :\</p>
                            @endforelse
                        </div>    
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection

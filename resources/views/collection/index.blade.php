@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <span class='legend'>NF = No Foil &nbsp;|&nbsp; F = Foil</span>
                <div class='filters'>
                    <!-- Collected filters -->
                    <div class='button-group' data-filter-group="owned">
                        <button data-filter="" type="button" class="btn btn-default selected js-default-filter btn-xs js-filter">All ({{ $countall }})</button>
                        <button data-filter=".card.collected" type="button" class="btn btn-default btn-xs js-filter">Collected (<span class='js-collected-count'>{{ $collected->count() }}</span>)</button>
                        <button data-filter=".card.not-collected" type="button" class="btn btn-default btn-xs js-filter">Not Collected (<span class='js-not-collected-count'>{{ $countall - $collected()->count() }}</span>)</button>
                    </div>
                    <!-- Type Filters -->
                    @include('shared.filters.elements')
                </div>
                <div class='clearfix'></div>
            </div>
            <div class="panel-body isotope">
                @if (isset($cards))
                    @forelse ($cards as $card)
                        <div class='card @if (!empty($collected[$card->id])) collected @else not-collected @endif element-{{ $card->element }}' data-card-id="{{ $card->id }}">
                            <div class='card-image @if (!empty($collected[$card->id]) && $collected[$card->id]->foil) has-foil @else no-foil @endif'>
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

                                    @if (Auth::user()->admin)
                                        <a class='edit-card-button' href="/card/edit/{{ $card->id }}">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>                                                
                                    @endif

                                </div>
                                <div class='card-count'>@if (!empty($collected[$card->id])) {{$collected[$card->id]->count}} @else 0 @endif</div>
                                <div title='Mark foil' class='js-foil-toggle foil-card'>@if (!empty($collected[$card->id]) && $collected[$card->id]->foil) F @else NF @endif</div>
                            </div>
                            <div class='card-number'>{{$card->set_number}}-{{ str_pad($card->card_number, 3, 0, STR_PAD_LEFT) }}-{{$card->rarity}}</div>
                        </div>
                    @empty
                        <p>No cards in the database, uhoh :\</p>
                    @endforelse

                    @section('scripts')
                        <script type="text/javascript">
                            $(document).ready(function() {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $('.js-add-card').click(function(event) {
                                    event.preventDefault ? event.preventDefault() : (event.returnValue = false);
                                    var $card = $(this).parents('.card');
                                    var card_id = $card.attr('data-card-id');
                                    $.post('/collection/update', { card_id: card_id, 'type': 'add' }, function(data) {
                                        console.log(data);
                                    });
                                    count_updated($card, 1);
                                });
                                
                                $('.js-remove-card').click(function(event) {
                                    event.preventDefault ? event.preventDefault() : (event.returnValue = false);
                                    var $card = $(this).parents('.card');
                                    var card_id = $(this).parents('.card').attr('data-card-id');
                                    $.post('/collection/update', { card_id: card_id, 'type': 'remove' }, function(data) {
                                        console.log(data);
                                    });
                                    count_updated($card, -1);
                                });

                                $('.js-foil-toggle').click(function(event) {
                                    event.preventDefault ? event.preventDefault() : (event.returnValue = false);
                                    var $card = $(this).parents('.card');
                                    var card_id = $(this).parents('.card').attr('data-card-id');
                                    var image = $card.find('.card-image');
                                    image.toggleClass('has-foil no-foil');
                                    if (image.hasClass('has-foil')) {
                                        var type = 'add';
                                        $(this).text('F');
                                        count_updated($card, 1);
                                    } else {
                                        var type = 'remove';
                                        $(this).text('NF');
                                        count_updated($card, -1);
                                    }
                                    $.post('/collection/markfoil', { card_id: card_id, 'type': type }, function(data) {
                                        console.log(data);
                                    });
                                    updateFoils();
                                });

                                function count_updated($card, num)
                                {
                                    var count = parseInt($card.find('.card-count').text()) + num;
                                    $card.find('.card-count').text(count);
                                    if (count == 0) {
                                        $card.addClass('not-collected').removeClass('collected');
                                    } else {
                                        $card.removeClass('not-collected').addClass('collected');
                                    }

                                    var count = $('.card.collected').length;
                                    $('.js-collected-count').text(count);
                                    $('.js-not-collected-count').text(216-count);
                                }
                            });
                        </script>
                    @endsection
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

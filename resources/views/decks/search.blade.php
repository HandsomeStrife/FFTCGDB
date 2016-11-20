@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div id="search-filters" class="panel panel-default">
                    <div class="panel-heading"><h4>Search Decks</h4></div>
                    <div class="panel-body">
                        <form id="deck-search-form" method="post">
                            <div class='form-group'>
                                <input class="form-control" type="text" name="keywords" value="" placeholder="Keyword search" />
                            </div>
                            <div class='form-group element-filters'>
                                <label>Element</label>
                                <div class='btn-group filter-toggle-select'>
                                    <label class='btn'>
                                        <input type="checkbox" name="elements[]" value="fire"/>
                                        <img src="/img/icons/fire.png" />
                                    </label>
                                    <label class='btn'>
                                        <input type="checkbox" name="elements[]" value="ice"/>
                                        <img src="/img/icons/ice.png" />
                                    </label>
                                    <label class='btn'>
                                        <input type="checkbox" name="elements[]" value="wind"/>
                                        <img src="/img/icons/wind.png" />
                                    </label>
                                    <label class='btn'>
                                        <input type="checkbox" name="elements[]" value="earth"/>
                                        <img src="/img/icons/earth.png" />
                                    </label>
                                    <label class='btn'>
                                        <input type="checkbox" name="elements[]" value="lightning"/>
                                        <img src="/img/icons/lightning.png" />
                                    </label>
                                    <label class='btn'>
                                        <input type="checkbox" name="elements[]" value="water"/>
                                        <img src="/img/icons/water.png" />
                                    </label>
                                    <label class='btn'>
                                        <input type="checkbox" name="elements[]" value="light"/>
                                        <img src="/img/icons/light.png" />
                                    </label>
                                    <label class='btn'>
                                        <input type="checkbox" name="elements[]" value="dark"/>
                                        <img src="/img/icons/dark.png" />
                                    </label>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label>Cards</label>
                                <select class="form-control js-select2" type="text" name="cards[]" multiple="multiple">
                                    @foreach ($cards as $c)
                                        <option value="{{ $c->id }}" data-image="/img/icons/{{ $c->element }}.png">{{ $c->name }} ({{ $c->fullCardNumber() }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="form-order-filters" class="form-group filter-toggle-select toggle-individual">
                                <label>Order By</label>
                                <div class="input-group">
                                    <div class='btn-group'>
                                        <button type="button" class="btn btn-default btn-sm selected">
                                            Most Recent
                                            <input type="checkbox" name="order" value="latest"/>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            Most Liked
                                            <input type="checkbox" name="order" value="likes"/>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            Most Commented
                                            <input type="checkbox" name="order" value="comments"/>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div id="deck-loading-container" class="panel panel-default">
                    @include('decks.results')
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var page = 1;
            var $form = $('#deck-search-form');
            var $window = $(window);
            var $container = $('#deck-loading-container');
            var ended = false;

            $('.filter-toggle-select .btn').click(function(evt) {
                evt.stopPropagation(); evt.preventDefault();
                var parent = $(this).parents('.filter-toggle-select');
                if (parent.hasClass('toggle-individual')) {
                    if (!$(this).hasClass('selected')) {
                        parent.find('.btn').removeClass("selected");
                        parent.find('input').prop("checked", false);
                        $(this).addClass('selected').find('input').prop("checked", true);
                    }
                } else {
                    $(this).toggleClass('selected');
                    var chkbx = $(this).find('input');
                    chkbx.prop("checked", !chkbx.prop("checked"));
                }
                $form.trigger('doupdate');
            });

            $form.find('input[name="keywords"]').keyup(function() {
                delay(function() {
                    $form.trigger('doupdate');
                }, 800 );
            });

            $form.on('doupdate change', function() {
                page = 1;
                ended = false;
                var loading = $container.find('.deck-list-loading');
                $container.html(loading.show());
                load();
            });

            $window.scroll(function () {
                if (!ended && $window.scrollTop() + $window.height() >= $(document).height()) {
                    page++; load();
                }
            });

            function load() {
                var data = $form.serialize() + '&' + $.param({ 'page': page });
                $.post(document.URL, data, function(d) {
                    if (!data) {
                        ended = true;
                        $container.find('.deck-list-loading').hide();
                    } else if (page == 1) {
                        $container.html(d);
                    } else {
                        $container.find('#deck-search-results').append(d);
                    }
                    attachTooltips();
                });
            }
        });
    </script>
    @endsection

@endsection
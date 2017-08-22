@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Search Criteria</h4></div>
                <div id="search-filters" class="panel-body">
                    <form id="card-search-form" method="post">
                        <div class='form-group'>
                            <input class="form-control" type="text" name="text" value="" placeholder="Keyword search" />
                        </div>
                        <div class='form-group element-filters'>
                            <label>Element</label>
                            <div class='btn-group filter-toggle-select'>
                                <label class='btn'>
                                    <input type="checkbox" name="element[]" value="fire"/>
                                    <img src="/img/icons/fire.png" data-title="fire" title="fire"/>
                                </label>
                                <label class='btn'>
                                    <input type="checkbox" name="element[]" value="ice"/>
                                    <img src="/img/icons/ice.png" data-title="ice" title="ice"/>
                                </label>
                                <label class='btn'>
                                    <input type="checkbox" name="element[]" value="wind"/>
                                    <img src="/img/icons/wind.png" data-title="wind" title="wind"/>
                                </label>
                                <label class='btn'>
                                    <input type="checkbox" name="element[]" value="earth"/>
                                    <img src="/img/icons/earth.png" data-title="earth" title="earth"/>
                                </label>
                                <label class='btn'>
                                    <input type="checkbox" name="element[]" value="lightning"/>
                                    <img src="/img/icons/lightning.png" data-title="lightning" title="lightning"/>
                                </label>
                                <label class='btn'>
                                    <input type="checkbox" name="element[]" value="water"/>
                                    <img src="/img/icons/water.png" data-title="water" title="water"/>
                                </label>
                                <label class='btn'>
                                    <input type="checkbox" name="element[]" value="light"/>
                                    <img src="/img/icons/light.png" data-title="light" title="light"/>
                                </label>
                                <label class='btn'>
                                    <input type="checkbox" name="element[]" value="dark"/>
                                    <img src="/img/icons/dark.png" data-title="dark" title="dark"/>
                                </label>
                            </div>
                        </div>
                        <div id="type-filter" class="form-group">
                            <label>Type</label>
                            <div class="input-group">
                                <div class='btn-group filter-toggle-select'>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Forward
                                        <input type="checkbox" name="types[]" value="forward"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Backup
                                        <input type="checkbox" name="types[]" value="backup"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Summon
                                        <input type="checkbox" name="types[]" value="summon"/>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="power-filter" class="form-group">
                            <label>Power</label>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <span class="selected-search"> equals </span>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu js-power-selection">
                                        <li><a data-type="equal">equals</a></li>
                                        <li><a data-type="more">is more than</a></li>
                                        <li><a data-type="less">is less than</a></li>
                                    </ul>
                                </div>
                                <input class="form-control input-sm" type="text" name="power" placeholder="Power" value="">
                                <input type="hidden" name="power_search_type" value="equal"/>
                            </div>
                        </div>
                        <div id="rarity-filter" class="form-group">
                            <label>Rarity</label>
                            <div class="input-group">
                                <div class='btn-group filter-toggle-select'>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Common
                                        <input type="checkbox" name="rarity[]" value="C"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Rare
                                        <input type="checkbox" name="rarity[]" value="R"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Hero
                                        <input type="checkbox" name="rarity[]" value="H"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Legend
                                        <input type="checkbox" name="rarity[]" value="L"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Starter
                                        <input type="checkbox" name="rarity[]" value="S"/>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="category-filter" class="form-group">
                            <label>Category</label>
                            <select class="form-control js-select2" name="category[]" multiple="multiple" placeholder="Start typing...">
                                <option value="i">Final Fantasy I (I)</option>
                                <option value="ii">Final Fantasy II (II)</option>
                                <option value="iii">Final Fantasy III (III)</option>
                                <option value="iv">Final Fantasy IV (IV)</option>
                                <option value="v">Final Fantasy V (V)</option>
                                <option value="vi">Final Fantasy VI (VI)</option>
                                <option value="vii">Final Fantasy VII (VII)</option>
                                <option value="viii">Final Fantasy VIII (VIII)</option>
                                <option value="ix">Final Fantasy IX (IX)</option>
                                <option value="x">Final Fantasy X (X)</option>
                                <option value="xi">Final Fantasy XI (XI)</option>
                                <option value="xii">Final Fantasy XII (XII)</option>
                                <option value="xiii">Final Fantasy XIII (XIII)</option>
                                <option value="xiv">Final Fantasy XIV (XIV)</option>
                                <option value="type-0">Final Fantasy Type-0 (TYPE-0)</option>
                                <option value="fft">Final Fantasy Tactics (FFT)</option>
                                <option value="dff">Dissidia Final Fantasy (DFF)</option>
                                <option value="lov">Lord of Vermilion (LOV)</option>
                                <option value="woff">World of Final Fantasy (WOFF)</option>
                            </select>
                        </div>
                        <div id="traits-filter" class="form-group">
                            <label>Traits</label>
                            <div class="input-group">
                                <div class='btn-group filter-toggle-select'>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Haste
                                        <input type="checkbox" name="traits[]" value="haste"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Brave
                                        <input type="checkbox" name="traits[]" value="brave"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        First Strike
                                        <input type="checkbox" name="traits[]" value="first strike"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Search
                                        <input type="checkbox" name="traits[]" value="search"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Freeze
                                        <input type="checkbox" name="traits[]" value="freeze"/>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="sets-filter" class="form-group">
                            <label>Sets</label>
                            <div class="input-group">
                                <div class='btn-group filter-toggle-select'>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Opus I
                                        <input type="checkbox" name="sets[]" value="1"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Opus II
                                        <input type="checkbox" name="sets[]" value="2"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Opus III
                                        <input type="checkbox" name="sets[]" value="3"/>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        Promo
                                        <input type="checkbox" name="sets[]" value="pr"/>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div>
                <div id="search-message">
                    <p>Please enter some search criteria</p>
                </div>
                <div id="search-results-grid" class='isotope'>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script id="js-search-item-render" type="text/text">
    <a class='js-hover-info'
        data-id="%id%"
        data-element="%element%"
        data-cost="%cost%"
        data-number="%full_number%"
        data-title="%name%" 
        target="_blank" 
        href="/card/%full_number%">
            <img src="/img/cards/100x140/%set_number%/%number%.png">
    </a>
</script>
<script type="text/javascript">
    $(document).ready(function() {

        var $form = $('#card-search-form');

        $('.filter-toggle-select .btn').click(function(evt) {
            evt.stopPropagation(); evt.preventDefault();
            $(this).toggleClass("selected");
            var chkbx = $(this).find('input');
            chkbx.prop("checked", !chkbx.prop("checked"));
            $form.trigger('doupdate');
        });

        var power = $('#power-filter');
        $('.js-power-selection a').click(function() {
            power.find('.selected-search').text($(this).text());
            power.find('[name="power_search_type"]').val($(this).attr('data-type'));
            $form.trigger('doupdate');
        });
     
        $form.find('input[type="text"]').keyup(function() {
            delay(function() {
                $form.trigger('doupdate');
            }, 800 );
        });

        var $msg = $('#search-message');
        var $grid = $('#search-results-grid');
        var $html = $('#js-search-item-render');
        $form.on('doupdate', function() {
            $.post(document.URL, $form.serialize(), function(data) {
                if (data.noq == true) {
                    $msg.text("Please enter some search criteria");
                    $grid.isotope('remove', $grid.find('.card'));
                } else if (data.length == 0) {
                    $msg.text("No results found");
                    $grid.isotope('remove', $grid.find('.card'));
                } else {
                    $msg.text("");
                    $items = [];
                    $.each(data, function(i, o) {
                        var $wrap = $('<div class="card" />');
                        var html = $html.html()
                                        .replace(/%id%/g, o.id)
                                        .replace(/%element%/g, o.element)
                                        .replace(/%cost%/g, o.cost)
                                        .replace(/%full_number%/g, o.set_number + "-" + (('000'+o.card_number).substring(o.card_number.length)) + '-' + o.rarity)
                                        .replace(/%name%/g, o.name)
                                        .replace(/%set_number%/g, o.set_number)
                                        .replace(/%number%/g, o.card_number);
                        $wrap.append(html);
                        $items.push($wrap[0]);
                    });
                    $grid.isotope('remove', $grid.find('.card')).isotope('insert', $items);
                    attachCardHover();
                }
            });
        });

    });
</script>
@endsection

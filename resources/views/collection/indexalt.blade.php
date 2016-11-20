@extends('layouts.app')

@section('content')
<div id="advanced-management-layout" class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 style="margin-bottom: 10px;">Your Collection</h4>
                        <p>This collection page will save automatically - however if you wish to be doubly sure, please use the "Save" button at the bottom of the page. <noscript><strong>You do not have JavaScript enabled, so please use the save button.</strong></noscript></p>

                        

                    </div>
                    <div class="panel-body">
                        <table class="table isortope">
                            <thead>
                                <tr>
                                    <th style="width: 100px">#</th>
                                    <th style="width: 200px">Card Name</th>
                                    <th class='collection'>Copies</th>
                                    <th class='collection'>Foil Copies</th>
                                    <th class='trade'>For Trade</th>
                                    <th class='trade'>Foil For Trade</th>
                                    <th class='wanted'>Wanted</th>
                                    <th class='wanted'>Foil Wanted</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cards as $card)
                                    <tr class="@if (isset($collected[$card->id]) && ($collected[$card->id]->count or $collected[$card->id]->foil_count)) collected @else not-collected @endif element-{{ $card->element }}">
                                        <td>{{ $card->fullCardNumber() }}</td>
                                        <td>
                                            <img class="small-icon" src="/img/icons/{{ $card->element }}.png" />
                                            <a class='js-hover-info' 
                                                data-id="{{ $card->id }}"
                                                data-element="{{ $card->element }}"
                                                data-cost="{{ $card->cost }}"
                                                data-number="{{ $card->fullCardNumber() }}"
                                                data-title="{{ $card->name }}"
                                                href="/cards/{{ $card->card_number }}.png">
                                                {{ $card->name }}
                                            </a>
                                        </td>
                                        <td class='collection'>
                                            <input name="card[{{ $card->id }}][count]" class="form-control input-sm" type="number" value="{{ $collected[$card->id]->count or 0 }}"/>
                                        </td>
                                        <td class='collection'>
                                            <input name="card[{{ $card->id }}][foil_count]" class="form-control input-sm" type="number" value="{{ $collected[$card->id]->foil_count or 0 }}"/>
                                        </td>
                                        <td class='trade'>
                                            <input name="card[{{ $card->id }}][trade_count]" class="form-control input-sm" type="number" value="{{ $collected[$card->id]->trade_count or 0 }}"/>
                                        </td>
                                        <td class='trade'>
                                            <input name="card[{{ $card->id }}][foil_trade_count]" class="form-control input-sm" type="number" value="{{ $collected[$card->id]->foil_trade_count or 0 }}"/>
                                        </td>
                                        <td class='wanted'>
                                            <input name="card[{{ $card->id }}][wanted]" class="form-control input-sm" type="number" value="{{ $collected[$card->id]->wanted or 0 }}"/>
                                        </td>
                                        <td class='wanted'>
                                            <input name="card[{{ $card->id }}][foil_wanted]" class="form-control input-sm" type="number" value="{{ $collected[$card->id]->foil_wanted or 0 }}"/>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <input type="submit" class='btn btn-default' value="Save"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!--<script type="text/javascript" src="/js/isortope-min.js"></script>-->
<script type="text/javascript">
    $(document).ready(function() {

        var $form = $('#advanced-management-layout').find('form');

        var delay = (function(){
            var timer = 0;
            return function(callback, ms){
                clearTimeout (timer);
                timer = setTimeout(callback, ms);
            };
        })();
     
        $form.find('input').keyup(function() {
            delay(function() {
                $.post(document.URL, $form.serialize(), function() {
                    console.log('updated');
                });
            }, 800 );
        });
    });
</script>
@endsection
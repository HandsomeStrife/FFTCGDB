<li class='img-instead'>
    <img class="small-icon" src="/img/icons/{{ $collect->card->element }}.png" />
    <a class='js-hover-info' 
        data-id="{{ $collect->card_id }}"
        data-element="{{ $collect->card->element }}"
        data-cost="{{ $collect->card->cost }}"
        data-number="{{ $collect->card->fullCardNumber() }}"
        data-title="{{ $collect->card->name }}"
        href="/card/{{ $collect->card->fullCardNumber() }}">
        {{ $collect->card->name }} ({{ $collect->card->fullCardNumber() }})
    </a> 
    @if ($collect->trade_count > 0 && $collect->foil_trade_count)
        ({{$collect->trade_count}} regular, {{$collect->foil_trade_count}} foil)
    @elseif ($collect->trade_count > 0)
        ({{$collect->trade_count}} regular)
    @elseif ($collect->foil_trade_count > 0)
        ({{$collect->foil_trade_count}} foil)
    @endif
</li>
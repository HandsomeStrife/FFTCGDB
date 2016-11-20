<li class='img-instead'>
    <img class="small-icon" src="/img/icons/{{ $card->element }}.png" />
    <a class='js-hover-info' 
        data-id="{{ $card->card_id }}"
        data-element="{{ $card->element }}"
        data-cost="{{ $card->cost }}"
        data-number="{{ $card->fullCardNumber() }}"
        data-title="{{ $card->name }}"
        href="/card/{{ $card->fullCardNumber() }}">
        {{ $card->name }} ({{ $card->fullCardNumber() }})
    </a> 
    @if ($card->trade_count > 0 && $card->foil_trade_count)
        ({{$card->trade_count}} regular, {{$card->foil_trade_count}} foil)
    @elseif ($card->trade_count > 0)
        ({{$card->trade_count}} regular)
    @elseif ($card->foil_trade_count > 0)
        ({{$card->foil_trade_count}} foil)
    @endif
</li>
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
    @if ($card->wanted > 0 && $card->foil_wanted)
        ({{$card->wanted}} regular, {{$card->foil_wanted}} foil)
    @elseif ($card->wanted > 0)
        ({{$card->wanted}} regular)
    @elseif ($card->foil_wanted > 0)
        ({{$card->foil_wanted}} foil)
    @endif
</li>
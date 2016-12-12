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
    @if ($collect->wanted > 0 && $collect->foil_wanted)
        ({{$collect->wanted}} regular, {{$collect->foil_wanted}} foil)
    @elseif ($collect->wanted > 0)
        ({{$collect->wanted}} regular)
    @elseif ($collect->foil_wanted > 0)
        ({{$collect->foil_wanted}} foil)
    @endif
</li>
<li class='img-instead'>
    <img class="small-icon" src="/img/icons/{{ $card->element }}.png" />
    <a class='js-hover-info' 
        data-id="{{ $card->id }}"
        data-element="{{ $card->element }}"
        data-cost="{{ $card->cost }}"
        data-number="{{ $card->fullCardNumber() }}"
        data-title="{{ $card->name }}"
        href="/card/{{ $card->fullCardNumber() }}">
        {{ $card->name }}
    </a> 
    (<span>{{ $card->pivot->count }}</span>)
</li>
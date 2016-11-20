<li>
    <a class='js-hover-info' 
        data-id="{{ $card->id }}"
        title="{{ $card->name }}"
        content="{{ $card->text }}"
        href="/card/{{ $card->fullCardNumber() }}">{{ $card->name }}</a> (<span>{{ $card->count }}</span>)
</li>
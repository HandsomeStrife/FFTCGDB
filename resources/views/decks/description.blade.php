@if (!empty($card))
    <div class='hover-card-details'>
        <img class="card-details-small-image @if (empty($card->text)) no-text @endif" src="/img/cards/100x140/{{$card->set_number}}/{{$card->card_number}}.png" />
        {!! $card->formatDescription() !!}
    </div>
@endif
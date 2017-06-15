@extends('layouts.app')

@section('content')
<div class="container card-view">
    <div class="row">
        <div class="col-md-5">
            <img class='full-size' src="/img/cards/original/{{ $card->set_number }}/{{ $card->card_number }}.png" />
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $card->name }}
                        <div class='like-button js-like'><i class="fa @if (Auth::check() && $card->likes->contains(Auth::user()->id)) fa-heart @else fa-heart-o @endif" aria-hidden="true"></i> <span>{{ $card->likes->count() }}</span></div>
                        @if (Auth::user() && Auth::user()->admin)
                            <a href="/card/edit/{{ $card->id }}" class='edit-card'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        @endif
                    </h4>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="border-top: none;">Cost</th>
                                <td style="border-top: none;">{{ $card->cost }}</td>
                            </tr>
                            <tr>
                                <th>Element</th>
                                <td><img class='small-icon' src="/img/icons/{{ $card->element }}.png" /> ({{ ucfirst($card->element) }})</td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>{{ ucfirst($card->type) }}</td>
                            </tr>
                            <tr>
                                <th>Job</th>
                                <td>{{ $card->job }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $card->category }}</td>
                            </tr>
                            <tr>
                                <th>Card Text</th>
                                <td>{!! $card->formatDescription() !!}</td>
                            </tr>
                            @if (!empty($card->power))
                                <tr>
                                    <th>Power</th>
                                    <td>{{ $card->power }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th>Rarity</th>
                                <td>{{ $card->rarity }}</td>
                            </tr>
                            <tr>
                                <th>Card Number</th>
                                <td>{{ $card->fullCardNumber() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @section('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                @if (Auth::check())
                    $('.js-like').click(function() {
                        $.post('/card/like', { card_id: {{$card->id}} }, function() {
                            // 
                        });
                        var i = $(this).find('i');
                        var count = $(this).find('span');
                        var num = parseInt(count.text());
                        if (i.hasClass('fa-heart-o')) {
                            count.text(num+1);
                        } else {
                            count.text(num-1);
                        }
                        i.toggleClass('fa-heart-o fa-heart');
                    });
                @endif
            });
        </script>
        @endsection

        <!-- Comments -->
        @if (Auth::user() && Auth::user()->admin)
            
        @endif
    </div>
</div>
@endsection
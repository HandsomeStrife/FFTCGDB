@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>@if (!empty($post->id)) Edit @else Create New @endif Blog Post</h5></div>
                    <div class="panel-body">
                        {{$post->id}}
                        <form method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$post->title}}">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="content" name="content" placeholder="Content" rows="6">{{$post->content}}</textarea>
                                <span class="help-block">To mention a card, type # followed by the name of the card you wish to mention.</span>
                            </div>
                            <div class="form-group checkbox">
                                <label>
                                    <input type="checkbox" id="draft" name="draft" value="1" @if ($post->draft) checked="checked" @endif/>
                                    Save as draft?
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.7.3/jquery.textcomplete.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('textarea#content').textcomplete([{
            id: 'name',
            match: /(^|\s)#(\w*)$/,
            search: function (term, callback) {
                $.post('/search', { 'text' : term }).done(function(resp) {
                    callback(resp); // `resp` must be an Array
                }).fail(function () {
                    callback([]); // Callback must be invoked even if something went wrong.
                });
            },
            template: function (card) {
                if (!card.name) {
                    return 'Start typing the card name';
                }
                return "<img height='40' src='/img/cards/100x140/" + card.set_number + "/" + card.card_number + ".png'/> " + card.name + " " + generateCardNumber(card);
            },
            replace: function (card) {
                return "(" + card.name + ") " + generateCardNumber(card);
            }
        }]);

        function generateCardNumber(card) {
            return "[" + card.set_number + "-" + ('000' + card.card_number).substring(card.card_number.length) + "-" + card.rarity + "]";
        }
    })
</script>
@endsection
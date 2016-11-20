@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Messages</h4>
                </div>
                <div class="list-group">
                    <a href="/messages" class="list-group-item">Inbox</a>
                    <a href="/messages/create" class="list-group-item">Compose</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Messages</h3></div>
                <div class="panel-body">
                    @if (Session::has('error_message'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error_message') }}
                        </div>
                    @endif
                    @if($threads->count() > 0)
                        @foreach($threads as $thread)
                        <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
                        <div class="deck-row-layout media alert {{ $class }}">
                            <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
                            <p>{{ $thread->latestMessage->body }}</p>
                            <p>
                                <br/>
                                {!! $thread->participantsAvatars() !!}
                            </p>
                        </div>
                        @endforeach
                    @else
                        <p>Sorry, no threads.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
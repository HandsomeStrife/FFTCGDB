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
                <div class="panel-heading"><h3>{{ $thread->subject }}</h3></div>
                <div class="panel-body">
                    @foreach($thread->messages as $message)
                    <table class="private-message @if ($message->user->id == Auth::user()->id) author @endif" width="100%">
                        <tr>
                            @if ($message->user->id == Auth::user()->id)
                            <td class='private-message-avatar'>
                                <a href="/u/{{ $message->user->username }}">
                                    <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64" alt="{{ $message->user->name }}" class="img-circle">
                                    <br/>
                                    {{ $message->user->name }}
                                </a>
                            </td>
                            @endif
                            <td>
                                <div class="private-message-body">
                                    <p>{{ $message->body }}</p>
                                    <div class="text-muted"><small>Posted {{ $message->created_at->diffForHumans() }}</small></div>
                                </div>
                            </td>
                            @if ($message->user->id != Auth::user()->id)
                            <td class='private-message-avatar' width="74">
                                <a href="/u/{{ $message->user->username }}">
                                    <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64" alt="{{ $message->user->name }}" class="img-circle">
                                    <br/>
                                    {{ $message->user->name }}
                                </a>
                            </td>
                            @endif
                        </div>
                    </table>
                    @endforeach
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h5>Add a new message</h5></div>
                <div class="panel-body">
                    {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
                    <!-- Message Form Input -->
                    <div class="form-group">
                        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Submit Form Input -->
                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
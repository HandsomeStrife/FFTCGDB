@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new message</div>
                {!! Form::open(['route' => 'messages.store']) !!}
                    <div class="panel-body">
                        
                        <!-- Subject Form Input -->
                        <div class="form-group">
                            {!! Form::label('recipients', 'Recipients', ['class' => 'control-label']) !!}
                            {!! Form::select('recipients', $users, null, ['class' => 'form-control js-select2', 'multiple' => 'multiple']) !!}
                        </div>

                        <!-- Subject Form Input -->
                        <div class="form-group">
                            {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
                            {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Message Form Input -->
                        <div class="form-group">
                            {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        <!-- Submit Form Input -->
                        <div class="form-group">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
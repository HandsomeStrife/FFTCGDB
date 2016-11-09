@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Settings</h4>
                    </div>
                    <div class="list-group">
                        <a href="/profile" class="list-group-item">Your Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="post">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Country</label>
                                <select class="form-control" name="country_id">
                                    <option value="0"> - Please Select - </option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @if ($country->id == $user->country_id) selected="selected" @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" autocomplete="off">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="control-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
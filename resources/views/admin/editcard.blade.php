@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Card</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="/img/cards/original/{{ $card->card_number }}.png"/>
                        </div>
                        <div class="col-md-6">
                            <form method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Card Title" value="{{$card->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="cost">Cost</label>
                                    <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost" value="{{$card->cost}}">
                                </div>
                                <div class="form-group">
                                    <label for="element">Element</label>
                                    <select class="form-control" name="element">
                                        <option value="fire" @if ($card->element == 'fire') selected="selected" @endif>Fire</option>
                                        <option value="ice" @if ($card->element == 'ice') selected="selected" @endif>Ice</option>
                                        <option value="wind" @if ($card->element == 'wind') selected="selected" @endif>Wind</option>
                                        <option value="earth" @if ($card->element == 'earth') selected="selected" @endif>Earth</option>
                                        <option value="lightning" @if ($card->element == 'lightning') selected="selected" @endif>Lightning</option>
                                        <option value="water" @if ($card->element == 'water') selected="selected" @endif>Water</option>
                                        <option value="light" @if ($card->element == 'light') selected="selected" @endif>Light</option>
                                        <option value="dark" @if ($card->element == 'dark') selected="selected" @endif>Dark</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control" name="type">
                                        <option value="forward" @if ($card->type == 'forward') selected="selected" @endif>Forward</option>
                                        <option value="backup" @if ($card->type == 'backup') selected="selected" @endif>Backup</option>
                                        <option value="summon" @if ($card->type == 'summon') selected="selected" @endif>Summon</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="job">Job</label>
                                    <input type="text" class="form-control" id="job" name="job" placeholder="Job" value="{{$card->job}}">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <input type="text" class="form-control" id="category" name="category" placeholder="Category" value="{{$card->category}}">
                                </div>
                                <div class="form-group">
                                    <label for="text">Text</label>
                                    <textarea id="text" name="text" class="form-control">{{$card->text}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="card_number">Card Number</label>
                                    <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Card Number" value="{{$card->card_number}}">
                                </div>
                                <div class="form-group">
                                    <label for="rarity">Rarity</label>
                                    <input type="text" class="form-control" id="rarity" name="rarity" placeholder="Rarity" value="{{$card->rarity}}">
                                </div>
                                <div class="form-group">
                                    <label for="power">Power</label>
                                    <input type="text" class="form-control" id="power" name="power" placeholder="Power" value="{{$card->power}}">
                                </div>

                                  <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Filters</h4>
                    </div>
                    <div class="list-group">
                        <a class='list-group-item active' href="#">All</a>
                        <a class='list-group-item' href="#">Collected</a>
                        <a class='list-group-item' href="#">Wanted</a>
                        <a class='list-group-item' href="#">For Trade</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="table-list-collection">
                            @include('collection.elements.collection_table')
                        </div>
                        <div id="image-list-collection">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
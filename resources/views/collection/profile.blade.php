@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Please be sure to save your collection using the "Save" button at the bottom of the page once done editing.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <div class="container">
        <div class="row">
            <!--
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
            -->
            <div class="col-md-12">
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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            var $form = $('#advanced-management-layout');

            var delay = (function(){
                var timer = 0;
                return function(callback, ms){
                    clearTimeout (timer);
                    timer = setTimeout(callback, ms);
                };
            })();
         
            $form.find('input').keyup(function() {
                delay(function() {
                    $.post(document.URL, $form.serialize(), function() {
                        console.log('Collection Saved');
                    });
                }, 800 );
            });
        });
    </script>
@endsection
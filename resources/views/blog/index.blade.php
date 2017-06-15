@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="@if (!Auth::check()) col-md-12 @else col-md-8 @endif">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>Most Recent</h5></div>
                    <div class="panel-body">
                        @forelse ($recent_posts as $post)
                            <fieldset class='blog-post'>
                                <div class='blog-header'>
                                    <h3>{{ $post->title }}</h3>
                                    <p></p>
                                </div>
                            </fieldset>
                        @empty
                            <!-- Empty -->
                        @endforelse
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h5>Highest Rated</h5></div>
                    <div class="panel-body">

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h5>Most Viewed</h5></div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
            @if (Auth::check())
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="/blog/new" class="btn btn-success btn-block">Create New Blog Post</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
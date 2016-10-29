@extends('layouts.master')

@section('content')
    <div class="fixed-nav">
        <div class="home-header">
            <h1 class="home-header">Olena Soloviova photography</h1>
        </div>
        <div class="dropdown-categories pull-right">
            <span class="dropdown-triger">Categories <span class="arrow-down"></span></span>
            <ul class="categories">
                @foreach($albumsInCategory as $category)
                    <li><a href="{{ asset($category->name . '/') }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="main-gallery" style="margin: 30px 0 60px 0">
        @foreach($titlePhotos as $titlePhoto)
        <div class="album-title" style="display: inline-block; float: left; ">
            <div class="image" style="width: 294px; height: 294px; text-align: center; overflow: hidden; margin-right: 5px; margin-bottom: 5px; background: #EEEEEE">
                <img src="{{ asset('images/albums/' . $titlePhoto->photo_name) }}"
                     alt="Title photo from {{ $titlePhoto->album->name }}"
                     style="height: 100%; margin-left: -25%">
            </div>
            <div class="album-title-hover">
                <a href=""></a>
            </div>
        </div>
        @endforeach
        <div style="clear: both;"></div>
    </div>

@endsection
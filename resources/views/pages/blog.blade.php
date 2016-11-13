@extends('layouts.master')

@section('content')
    @include('partials.fixed-nav')

    <div class="blog-gallery">
        @foreach($titlePhotos as $photo)
            @if(isset($photo))
        <div class="blog-albums">
            <div class="album-header"
                 @if($photo->album->category->id == 1) style="{{ 'background-color: RGBA(255,0,210,0.85)' }}"
                 @elseif($photo->album->category->id == 2) style="{{ 'background-color: RGBA(3,237,237,0.85)' }}"
                 @elseif($photo->album->category->id == 3) style="{{ 'background-color: RGBA(166,126,57,0.85)' }}"
                 @else style="{{ 'background-color: RGBA(195,231,0,0.85)' }}"
                 @endif>
                <ul class="album-header-ul">
                    <li>
                        {{ $photo->album->shot_date }}
                    </li>
                    <li>
                        <a href="{{ asset('photos/' . $photo->album->category->name) }}">
                            {{ $photo->album->category->name }}
                        </a>
                    </li>
                </ul>
                <h1><a href="{{ asset('album/' . $photo->album->id) }}">{{ $photo->album->name }}</a></h1>
            </div>
            <img src="{{ asset('images/albums/' . $photo->photo_name) }}" alt="Photo: {{ $photo->photo_name }}">
        </div>
            @endif
        @endforeach
        <div class="my-pagination">
            {{ $albums }}
            <div class="clearfix"></div>
        </div>
    </div>

@endsection
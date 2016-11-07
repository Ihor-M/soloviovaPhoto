@extends('pages.photos')

@section('albums')
    <div>
        <div id="slider">
            <ul class="slides">
                @foreach($photosInCategory as $photo)
                <li class="slide">
                    <img src="{{ asset('images/albums/' . $photo->photo_name) }}"
                     alt="Album name: {{ $photo->name }}"
                     class="image">
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div>
        <h2 class="pull-right">Check out some featured weddings</h2>
        <div class="clearfix"></div>
    </div>
    <div class="main-gallery">
        @foreach($titlePhotos as $titlePhoto)
            <div class="album-title">
                <div class="image">
                    <img src="{{ asset('images/albums/' . $titlePhoto->photo_name) }}"
                         alt="Title photo from {{ $titlePhoto->album->name }}">
                    <div class="album-title-hover wedding-hover">
                        <a href="{{ asset('album/' . $titlePhoto->album->id) }}">
                            {{ $titlePhoto->album->name }}
                        </a>
                        <span>
                        {{ $titlePhoto->album->category->name }}
                    </span>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="clearfix"></div>
    </div>
@endsection
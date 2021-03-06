@extends('layouts.master')

@section('content')
    @include('partials.fixed-nav')
    <div class="main-gallery">
        @foreach($titlePhotos as $titlePhoto)
            @if(isset($titlePhoto))
                <div class="album-title">
                    <div class="image">
                        <img src="{{ asset('images/albums/' . $titlePhoto->photo_name) }}"
                             alt="Title photo from {{ $titlePhoto->album->name }}">
                        <div class="album-title-hover"
                        @if($titlePhoto->album->category->id == 1) style="{{ 'background-color: RGBA(255,0,210,0.85)' }}"
                        @elseif($titlePhoto->album->category->id == 2) style="{{ 'background-color: RGBA(3,237,237,0.85)' }}"
                        @elseif($titlePhoto->album->category->id == 3) style="{{ 'background-color: RGBA(166,126,57,0.85)' }}"
                        @else style="{{ 'background-color: RGBA(195,231,0,0.85)' }}"
                        @endif>
                            <a href="{{ asset('album/' . $titlePhoto->album->id) }}">
                                {{ $titlePhoto->album->name }}
                            </a>
                            <span>
                                {{ $titlePhoto->album->category->name }}
                            </span>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="clearfix"></div>
    </div>

@endsection
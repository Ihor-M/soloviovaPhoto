@extends('layouts.master')

@section('content')
    <div class="fixed-nav">
        <div class="home-header">
            <h1 class="home-header"><a href="{{ asset('/') }}">Soloviova photography</a></h1>
        </div>
    </div>
    <div class="album">
        <div class="album-header"
             @if($album->category_id == 1) style="{{ 'background-color: RGBA(255,0,210,0.85)' }}"
             @elseif($album->category_id == 2) style="{{ 'background-color: RGBA(3,237,237,0.85)' }}"
             @elseif($album->category_id == 3) style="{{ 'background-color: RGBA(166,126,57,0.85)' }}"
             @else style="{{ 'background-color: RGBA(195,231,0,0.85)' }}"
                @endif>
            <ul class="album-header-ul">
                <li>
                    {{ $album->shot_date }}
                </li>
                <li>
                    <a href="{{ asset('photos/' . $album->category->name) }}">
                        {{ $album->category->name }}
                    </a>
                </li>
            </ul>
            <h1>{{ $album->name }}</h1>
        </div>

        @foreach($album->photos as $photo)
        <div class="photo">
            <img src="{{ asset('images/albums/' . $photo->photo_name) }}" alt="{{ $photo->photo_name }}">
        </div>
        @endforeach
    </div>

@endsection
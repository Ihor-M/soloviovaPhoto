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
{{--        @foreach($album->photos as $photo)--}}

        @for($i = 0; $i <= count($album->photos) - 1; $i++)
            @if($photoDimensions[$i]['Width'] > $photoDimensions[$i]['Height'])
                <div class="photo">
                    <img src="{{ asset('images/albums/' . $album->photos[$i]->photo_name) }}" alt="{{ $album->photos[$i]->photo_name }}">
                </div>
            @else
                <div style="width: 900px; margin-bottom: 30px;">
                    <img src="{{ asset('images/albums/' . $album->photos[$i]->photo_name) }}" alt="{{ $album->photos[$i]->photo_name }}" style="height: 100%; width: 100%;">
                </div>
            @endif
        {{--@endforeach--}}
        @endfor
    </div>

@endsection
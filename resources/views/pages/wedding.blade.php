@extends('pages.photos')

@section('albums')
    <div>
        <div class="slider">
            @foreach($photosInCategory as $photo)
                <div class="slide">
                    <img src="{{ asset('images/albums/' . $photo->photo_name) }}"
                         alt="Album name: {{ $photo->name }}"
                         class="image">
                </div>
            @endforeach
        </div>
    </div>
@endsection
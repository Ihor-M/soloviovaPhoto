@extends('layouts.master')

@section('content')
    <h1 class="home-header">{{ $album->name }}</h1>
    <div class="album">
    @foreach($album->photos as $photo)
            <img src="{{ asset('images/albums/' . $photo->photo_name) }}" alt="{{ $photo->photo_name }}" class="photo">
    @endforeach
    </div>
@endsection
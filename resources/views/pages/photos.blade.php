@extends('layouts.master')

@section('content')
<div class="fixed-nav">
    <div class="home-header">
        <h1 class="home-header">Olena Soloviova photography</h1>
    </div>
    <div class="photo-categories pull-right">
        <ul class="categories">
            <li><a href="{{ asset('photos/wedding') }}" @if($category === 'wedding') id="category-focus" @endif>wedding</a></li>
            <li><a href="{{ asset('photos/couples') }}" @if($category === 'couples') id="category-focus" @endif>couples</a></li>
            <li><a href="{{ asset('photos/family') }}" @if($category === 'family') id="category-focus" @endif>family</a></li>
            <li><a href="{{ asset('photos/lifestyle') }}" @if($category === 'lifestyle') id="category-focus" @endif>lifestyle</a></li>
        </ul>
    </div>
</div>

    @yield('albums')

@endsection
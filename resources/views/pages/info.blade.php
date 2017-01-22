@extends('layouts.master')

@section('content')

    <div class="fixed-nav">
        <div class="home-header">
            <h1 class="home-header"><a href="{{ asset('/') }}">Soloviova photography</a></h1>
        </div>
        <div class="photo-categories pull-right">
            <ul class="categories">
                <li><a href="{{ asset('about') }}">about</a></li>
                <li><a href="{{ asset('happy') }}">happy</a></li>
                <li><a href="{{ asset('contact') }}">contact</a></li>
            </ul>
        </div>
    </div>
    @yield('info')

@endsection
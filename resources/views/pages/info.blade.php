@extends('layouts.master')

@section('content')
    <div class="fixed-nav">
        <div class="home-header">
            <h1 class="home-header"><a href="{{ asset('/') }}">Soloviova photography</a></h1>
        </div>
        <div class="photo-categories pull-right">
            <ul class="categories">
                <li><a href="{{ asset('info/about') }}">about</a></li>
                <li><a href="{{ asset('info/happy') }}">happy</a></li>
                <li><a href="{{ asset('info/contact') }}">contact</a></li>
            </ul>
        </div>
    </div>
    <div class="tabs">
        <div class="about tab show">
            about tab
        </div>
        <div class="happy tab">
            happy tab
        </div>
        <div class="contact tab">
            contact tab
        </div>
    </div>



@endsection
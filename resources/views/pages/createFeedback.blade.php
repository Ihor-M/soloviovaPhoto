@extends('layouts.master')

@section('content')
    <div class="col-lg-9 col-lg-offset-1">
        @include('partials.authHeader')
        <a href="{{ asset('admin-create-album/') }}">Back to Create album page</a>
        <h1>Create feedback</h1>

        @foreach($feedbacks as $feedback)
            <ul>
                <li>{{$feedback->short_feedback}}</li>
                <li>{{$feedback->full_feedback}}</li>
                <li>{{$feedback->album->name}}</li>
            </ul>
        @endforeach
    </div>
@endsection
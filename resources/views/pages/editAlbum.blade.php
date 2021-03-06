@extends('layouts.master')

@section('content')
    <div class="col-lg-9 col-lg-offset-1">
        @include('partials.authHeader')
        <h1>Update album: {{ $album->name }}</h1>
        <a href="{{asset('admin-create-album')}}">Back to albums list</a>
        <form action="{{ route('updateAlbum', [$album->id]) }}" method="post" id="createAlbum" class="create-album-form">
            {{ method_field('put') }}
            @if(count($errors) > 0)
                <ul class="validation-errors">
                    @foreach($errors->all() as $error)
                        <li>
                            <span class="bg-warning text-danger message">{{$error}}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="form-group" >
                <label class="control-label" for="albumName">Album Name:</label>
                <input class="form-control" type="text" id="albumName" name="albumName" value="{{ $album->name }}">
            </div>
            <div class="form-inline">
                <div class="form-group">
                    <label class="control-label" for="shotDate">Shot date:</label>
                    <input class="form-control" type="date" id="shotDate" name="shotDate" value="{{ $album->shot_date }}">
                </div>
            </div>
            <div class="form-inline">
                <div class="form-group">
                    <label class="control-label" for="categories">Choose album category:</label>
                    <select class="form-control" id="categories" name="category" data-placement="{{ $album->category_id }}">
                        <option value="1" @if($album->category_id == 1) {{ 'selected' }} @endif>wedding</option>
                        <option value="2" @if($album->category_id == 2) {{ 'selected' }} @endif>couples</option>
                        <option value="3" @if($album->category_id == 3) {{ 'selected' }} @endif>family</option>
                        <option value="4" @if($album->category_id == 4) {{ 'selected' }} @endif>lifestyle</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="submit">
                <input class="btn btn-success" type="submit" value="Update">
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
@endsection



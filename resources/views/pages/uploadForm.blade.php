@extends('layouts.master')

@section('content')
    <div class="col-lg-8 col-lg-offset-1">
        <h1>{{ $album->name }}</h1>
        <h4>Upload Photos</h4>
        <a href="{{asset('admin-create-album')}}">Back to albums list</a>
        <form action="/admin-uploaded-photos" method="post" enctype="multipart/form-data" id="upload" class="create-album-form">
            <div class="form-inline">
                <div class="form-group">
                    <label class="control-label" for="newPhotos">Upload photos:</label>
                    <label class="input-file">
                        <input type="file" name="newPhotos" multiple>
                        Choose photos
                    </label>
                </div>
            </div>
            <input type="hidden" name="albumId" value="{{ $album->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="submit">
                <input class="btn btn-success" type="submit" value="Upload">
            </div>
        </form>
        <br>
        <div>
            @if($photoInAlbum)
                @foreach($photoInAlbum as $photo)
                <div style="width: 300px; height: 200px; float: left; margin: 10px;">
                    <img src="{{ asset('images/albums/' . $photo->photo_name) }}"
                         alt="photo"
                         style="width: 100%">
                </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection


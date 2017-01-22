@extends('layouts.master')

@section('content')
    <div class="col-lg-9 col-lg-offset-1">
        @include('partials.authHeader')
        <h1>Album: {{ $album->name }}</h1>
        <h4>Upload Photos</h4>
        <a href="{{asset('admin-create-album')}}">Back to albums list</a>
        <form action="{{ route('savePhotos') }}" method="post" enctype="multipart/form-data" id="upload" class="create-album-form">
            <div class="form-inline">
                <div class="form-group">
                    <label class="control-label" for="newPhotos">Upload photos:</label>
                    <label class="input-file">
                        <input type="file" name="newPhotos[]" id="fileinput" multiple>
                        Choose photos
                    </label>
                    @if(Session::has('alert'))
                        <span class="bg-warning text-danger message">
                            {{Session::get('alert')}}
                        </span>
                    @endif
                    {{--<span class="bg-info">{{$alert}}</span>--}}
                    {{--<span class="bg-danger">{{$error}}</span>--}}
                    {{--<input type="button" value="Load" class="btn btn-danger" onclick="showFileSize()">--}}
                </div>
            </div>
            <input type="hidden" name="albumId" value="{{ $album->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="submit">
                <input class="btn btn-success" type="submit" value="Save Photos">
            </div>
        </form>
        <br>
        <div class="uploaded-photos">
            @if(!$photoInAlbum->isEmpty())
                <h2>Photo list</h2>

                    @foreach($photoInAlbum as $index => $photo)
                    <section>
                        <div>
                            <img src="{{ asset('images/albums/' . $photo->photo_name) }}" alt="photo">
                        </div>
                        <a href="{{asset('admin-delete-photo/' . $photo->id)}}">
                            <span class="glyphicon glyphicon-trash"></span>
                            Delete photo
                        </a>
                    </section>
                    @endforeach

            @endif
        </div>
    </div>
    <div class="clearfix"></div>
@endsection

{{--@section('js')--}}
    {{--<script type='text/javascript'>--}}
        {{--function showFileSize() {--}}
            {{--var input, file;--}}

            {{--// (Can't use `typeof FileReader === "function"` because apparently--}}
            {{--// it comes back as "object" on some browsers. So just see if it's there--}}
            {{--// at all.)--}}
            {{--if (!window.FileReader) {--}}
                {{--bodyAppend("p", "The file API isn't supported on this browser yet.");--}}
                {{--return;--}}
            {{--}--}}

            {{--input = document.getElementById('fileinput');--}}
            {{--if (!input) {--}}
                {{--bodyAppend("p", "Um, couldn't find the fileinput element.");--}}
            {{--}--}}
            {{--else if (!input.files) {--}}
                {{--bodyAppend("p", "This browser doesn't seem to support the `files` property of file inputs.");--}}
            {{--}--}}
            {{--else if (!input.files[0]) {--}}
                {{--bodyAppend("p", "Please select a file before clicking 'Load'");--}}
            {{--}--}}
            {{--else {--}}
                {{--file = input.files[0];--}}
                {{--bodyAppend("p", "File " + file.name + " is " + file.size + " bytes in size");--}}
            {{--}--}}
        {{--}--}}

        {{--function bodyAppend(tagName, innerHTML) {--}}
            {{--var elm;--}}

            {{--elm = document.createElement(tagName);--}}
            {{--elm.innerHTML = innerHTML;--}}
            {{--document.body.appendChild(elm);--}}
        {{--}--}}
    {{--</script>--}}
{{--@endsection--}}
@extends('layouts.master')

@section('content')
<div class="col-lg-8 col-lg-offset-1">
    @include('partials.authHeader')
    <h1>Create new album</h1>
    <form action="{{ route('CreateAlbum') }}" method="post" id="createAlbum" class="create-album-form">
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
            <input class="form-control" type="text" id="albumName" name="albumName">
        </div>
        <div class="form-inline">
            <div class="form-group">
                <label class="control-label" for="shotDate">Shot date:</label>
                <input class="form-control" type="date" id="shotDate" name="shotDate">
            </div>
        </div>
        <div class="form-inline">
            <div class="form-group">
                <label class="control-label" for="categories">Choose album category:</label>
                <select class="form-control" id="categories" name="category" >
                    <option value="1">wedding</option>
                    <option value="2">couples</option>
                    <option value="3">family</option>
                    <option value="4">lifestyle</option>
                </select>
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="submit">
            <input class="btn btn-success" type="submit" value="Create">
        </div>
    </form>
</div>
@if(!$albums->isEmpty())
    <div class="col-lg-8 col-lg-offset-1">
        <br>
        <table class="table table-responsive table-striped">
            <tr class="bg-info">
                <th>id</th>
                <th>Album Name</th>
                <th>Shot Date</th>
                <th>Category</th>
                <th>Add Photos</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($albums as $album)
            <tr>
                <td>{{$album->id}}</td>
                <td>{{$album->name}}</td>
                <td>{{$album->shot_date}}</td>
                <td>{{$album->category->name}}</td>
                <td>
                    <a href="{{ asset('admin-upload-photos/' . $album->id) }}">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                         Add Photos
                    </a>
                </td>
                <td>
                    <a href="{{ asset('admin-edit-album/' . $album->id) }}">
                        <span class="glyphicon glyphicon-pencil"></span>
                         Edit Album
                    </a>
                </td>
                <td>
                    <a href="{{ asset('admin-delete-album/' . $album->id) }}">
                        <span class="glyphicon glyphicon-trash"></span>
                         Delete Album
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endif

@endsection



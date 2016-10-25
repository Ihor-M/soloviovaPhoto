@extends('layouts.master')

@section('content')
<div class="col-lg-8 col-lg-offset-1">
    <h1>Create new album</h1>
    <form action="/admin-create-album" method="post" enctype="multipart/form-data" id="createAlbum" class="create-album-form">
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
<div class="col-lg-8 col-lg-offset-1">
    <br>
    <table class="table table-responsive table-striped">
        <tr class="bg-info">
            <th>id</th>
            <th>Name</th>
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
            <td>{{$album->category_id}}</td>
            <td>
                <a href="{{ asset('admin-upload-photos/' . $album->id) }}">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                </a>
            </td>
            <td>
                <a href="">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
            <td>
                <a href="">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection



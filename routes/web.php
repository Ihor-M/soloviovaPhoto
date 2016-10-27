<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['namespace' => 'V1'], function () {
    Route::get('/', 'MainController@home')->name('Home');
    Route::get('photos', 'MainController@photos')->name('Photos');
    Route::get('blog', 'MainController@blog')->name('Blog');
    Route::get('info', 'MainController@info')->name('Info');
    Route::get('admin-create-album', 'CreateAlbumController@showCreateAlbumForm')->name('showCreateAlbumForm');
    Route::post('admin-create-album', 'CreateAlbumController@createAlbum')->name('CreateAlbum');
    Route::get('admin-edit-album/{id}', 'CreateAlbumController@editAlbum')->name('editAlbum');
    Route::put('admin-update-album/{id}', 'CreateAlbumController@updateAlbum')->name('updateAlbum');
    Route::get('admin-delete-album/{id}', 'CreateAlbumController@delete')->name('deleteAlbum');
    Route::get('admin-upload-photos/{id}', 'CreateAlbumController@showUploadForm')->name('uploadPhotos');
    Route::post('admin-uploaded-photos', 'CreateAlbumController@savePhotos')->name('savePhotos');
    Route::get('admin-delete-photo/{id}', 'CreateAlbumController@deletePhoto')->name('deletePhoto');
});

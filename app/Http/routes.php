<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/sender', 'WelcomeController@sender');

Route::get('/gallery/showgallery','GalleryController@index');
Route::get('/gallery/autoadd', 'UploadController@index');
Route::post('/gallery/autoadd', 'UploadController@index');
Route::get('/gallery/upload', function(){ return View('gallery.upload');});
Route::post('/gallery/upload', function(){ return View('gallery.upload');});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::group(['middleware'=>'auth'],function(){
    Route::get('/ts',[
        'as'=>'ts',
        'uses'=>'TsController@teamspeak',
    ]);

    Route::get('/gallery/add', function(){ return View('gallery-add');});
    Route::get('/gallery/show/{pic_name}','GalleryController@showPicture');
    Route::get('/gallery/show/thumbnails/{pic_name}','GalleryController@showThumb');
    Route::get('/gallery','GalleryController@showGallery');
    Route::post('/gallery/add',[
        'as'=>'gallery-add-post',
        'uses'=>'GalleryController@addPictures'
    ]);
});
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

Route::get('/gallery','GalleryController@index');
Route::get('/gallery/showGallery','GalleryController@showGallery');

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
    Route::get('/gallery/show/{thumbnails?}/{pic_name}','GalleryController@showPicture');
    Route::post('/gallery/add',[
        'as'=>'gallery-add-post',
        'uses'=>'GalleryController@addPictures'
    ]);
});
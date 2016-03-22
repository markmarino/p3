<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/lorem','LoremController@getIndex');
    Route::post('/lorem','LoremController@postIndex');
    Route::get('/loremresults','LoremController@getResults');
    Route::get('/rando','RandoController@getIndex');
    Route::post('/rando','RandoController@postIndex');
    Route::get('/randoresults','RandoController@getResults');
    Route::get('/practice', function() {

        $data = Array('foo' => 'bar');
        Debugbar::info($data);
        Debugbar::error('Error!');
        Debugbar::warning('Watch out…');
        Debugbar::addMessage('Another message', 'mylabel');

        return 'Practice';

    });
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});

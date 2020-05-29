<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //dd(\App\User::find(4)->posts);
    //dd(\App\Post::find(1)->user);

    /*$users = App\User::with('posts')->get();

    foreach ($users as $user) {
        echo $user->email."<br>";
        foreach ($user->posts as $post) {
            echo $post->description_post."<br><br>";
        }
    }*/
    return App\User::with('posts')->get();

    //return view('welcome');
});

/*Route::get('/clients', 'ClientController@index')->name('clients.index');

Route::get('/clients/create', 'ClientController@create')->name('clients.create');

Route::post('/clients', 'ClientController@store')->name('clients.store');

Route::get('/clients/{client:email}', 'ClientController@show')->name('clients.show');

Route::get('/clients/{client:email}/edit', 'ClientController@edit')->name('clients.edit');

Route::patch('/clients/{client:email}', 'ClientController@update')->name('clients.update');

Route::delete('/clients/{client:email}', 'ClientController@destroy')->name('clients.destroy');*/

Route::resource('/clients', 'ClientController');


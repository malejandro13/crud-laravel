<?php

use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;

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

/*DB::listen(function($query) {
    echo "<pre>{$query->time}</pre>";
});*/

Route::get('/logs', function () {
    return Activity::all()->last();
});

Route::get('/', function () {
    // UNO MUCHOS => A PARTIR DE LA INSTANCIA DE UN USUARIO
    //$user = App\User::find(1);

    //Forma 1
    /*$user->posts()->create([
        'title_post' => 'New Post',
        'description_post' => 'Description New Post',
    ]);*/

    //Forma 2
    /*App\Post::create([
        'title_post' => 'New Post',
        'description_post' => 'Description New Post',
        'user_id' => $user->id,
    ]);*/

    //Forma 3
    /*$post = App\Post::create([
        'title_post' => 'New Post',
        'description_post' => 'Description New Post'
    ]);

    $user->posts()->save($post);*/

    // MUCHOS A MUCHOS - ROLES 
    /*$user = App\User::find(2);

    $roles = ['3', '2'];

    //$user->roles()->attach($roles); // SOLO PARA CREAR
    $user->roles()->sync($roles);

    return App\User::find(2)->roles;

    return "true";*/

    return view('resultados', [
        'users' => App\User::with(['posts', 'roles'])->get(),
    ]);


});

/*Route::get('/clients', 'ClientController@index')->name('clients.index');

Route::get('/clients/create', 'ClientController@create')->name('clients.create');

Route::post('/clients', 'ClientController@store')->name('clients.store');

Route::get('/clients/{client:email}', 'ClientController@show')->name('clients.show');

Route::get('/clients/{client:email}/edit', 'ClientController@edit')->name('clients.edit');

Route::patch('/clients/{client:email}', 'ClientController@update')->name('clients.update');

Route::delete('/clients/{client:email}', 'ClientController@destroy')->name('clients.destroy');*/

Route::resource('/clients', 'ClientController');
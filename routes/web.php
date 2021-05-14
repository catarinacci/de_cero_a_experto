<?php

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

// Route::get('/', ['as' => 'home',function () {
//     return view('home');
//     // return view('welcome');
// }]);
// Route::get('saludo/{nombre?}', ['as' => 'saludo',function ($nombre = "Invitado") {
//     //return "Saludo $nombre";
//     //return view('saludo', ['nombre' => $nombre]);
//     // return view('saludo')->with(['nombre' => $nombre]);
//     return view('saludo', compact('nombre'));
// }])->where('nombre', "[A-Za-z]+");

// Route::get('/contacto', ['as' => 'contacto',function () {
//     return view('contacto');
// }]);

use App\Http\Controllers\PagesController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    $user = new App\User;
    $user->name = 'Oswald';
    $user->email = 'oswald@gmail.com';
    $user->password = bcrypt('12345678');
    $user->role_id = 2;
    $user->save();


    //   $user = User::create([
    //         'name' => 'Oswald',
    //         'email' => 'oswald@gmail.com',
    //         'password' => bcrypt('12345678'),
    //         'role_id' => 2,
    //     ]);
    //     var_dump($user);
    //     die();
    return $user;
});

// \App\User::created([
//     'name' => 'Oswald',
//     'email' => 'oswald@gmail.com',
//     'password' => bcrypt('12345678'),
//     'role' => 'Moderador'
// ]);

Route::get('/', ['as' => 'home', 'uses'=>'PagesController@home']);
Route::get('/saludo/{nombre?}', ['as' => 'saludo', 'uses'=>'PagesController@saludo'])->where('nombre', "[A-Za-z]+");
// Route::get('/contactame', ['as' => 'contactame', 'uses'=>'PagesController@contacto']);
// Route::post('contacto', 'PagesController@mensajes');

Route::resource('mensaje', 'MessagesController');
Route::resource('usuarios', 'UsersController');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

// Route::get('mensaje', ['as'=>'messages.index', 'uses' => 'MessagesController@index']);
// Route::get('mensaje/create', ['as'=>'messages.create', 'uses' => 'MessagesController@create']);
// Route::post('mensaje', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
// Route::get('mensaje/{id}', ['as'=>'messages.show', 'uses' => 'MessagesController@show']);
// Route::get('mensaje/{id}/edit', ['as'=>'messages.edit', 'uses' => 'MessagesController@edit']);
// Route::put('mensaje/{id}', ['as'=>'messages.update', 'uses' => 'MessagesController@update']);
// Route::delete('mensaje/{id}', ['as'=>'messages.destroy', 'uses' => 'MessagesController@destroy']);



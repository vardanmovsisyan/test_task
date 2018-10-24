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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/{name}',function(){
    return redirect('/');
})->where('name', '[\/\w\.-]*');
Route::post('/register/store', [
    'uses'=>'Auth\RegisterController@store',
    'as'=>'register.store'
]);
Route::post('/login/check',[
    'uses'=>'Auth\LoginController@check',
    'as'=>'login.check'
]);
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


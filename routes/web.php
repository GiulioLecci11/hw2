<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

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
    return view('login');
});

Route::get("/logout", "LoginController@logout");

Route::get("/login", "LoginController@login");
Route::post("/login", "LoginController@checkLogin");


Route::get('/signin','RegisterController@index');
Route::post('/signin','RegisterController@register');
Route::get('/signin/username/{usr}','RegisterController@checkUsername');
Route::get('/signin/email/{em}','RegisterController@checkEmail');


Route::get('/home','HomeController@index');
Route::get('/home/getPost','HomeController@getPost');
Route::get('/home/addPost/{text}','HomeController@addPost');
Route::get('/home/deletePost/{id}','HomeController@deletePost');
Route::get('/home/getStats','HomeController@getStats');
Route::get('/home/getSong/{song}','HomeController@getSong');


Route::get('/prefer','PreferController@index');
Route::get('/prefer/getStats','PreferController@getStats');
Route::get('/prefer/addPref/{id}','PreferController@addPref');
Route::get('/prefer/getPref','PreferController@getPref');
Route::get('/prefer/getUser','PreferController@getUser');
Route::get('/prefer/removePref/{id}','PreferController@removePref');

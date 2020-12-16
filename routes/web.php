<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
});

Auth::routes();

Route::get('/articles', 'HomeController@index')->name('home');

// // comment
// Route::post('home/article/{id}/comment', function() {
//     return 'yes';
// });


// show article
Route::match(['get'], 'articles/article/{id}', 'ArticleController@show')->name('article');

// Route::post('home/article/{id}', 'CommentController@store');


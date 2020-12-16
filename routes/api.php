<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Auth::routes();

// list Articles
Route::get('articles', "ArticleController@index");

// show single article
Route::get('article/{id}', "ArticleController@show_comments");

// comment
Route::match(['post', 'put'], 'article/{id}/comment', "ArticleController@store_comment");

// comment
// Route::post('article/{id}/comment', function() {
//     return redirect()->route('home');
// });

// Create new artcle
Route::match(['post', 'put'], 'article', "ArticleController@store");

// likes
Route::match(['post', 'put'], 'article/{id}/like', "ArticleController@update");

// comment
// Route::post('article/{id}', "ArticleController@store_comment");


//  update artcle
// Route::put('article', "ArticleController@store");

// Delete ARticle
Route::delete('article/{id}', "ArticleController@destroy");

// show article
Route::view('article', 'singleArticle')->name('singleArticle');


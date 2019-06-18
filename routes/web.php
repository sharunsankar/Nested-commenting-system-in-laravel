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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('add-article',['as'=>'add.article.post','uses'=>'ArticleController@addArticle']);
Route::get('articles',['as'=>'articles','uses'=>'ArticleController@getArticles']);
Route::get('article/{id}',['uses'=>'ArticleController@getArticle']);
Route::post('add-comment',['as'=> 'comment.add','uses'=>'CommentController@store']);

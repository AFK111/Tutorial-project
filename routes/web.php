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

// Route::get('/', function () {
//
//     return view('welcome');
// });
//
// Route::get('/about',function(){
//   //dd('dd function');  //stop the program and print error message
//   return view('Pages.about');
// });

Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');

//posts routes
Route::get('/posts','PostsController@index')->name('posts.index');
Route::get('/posts/create','PostsController@create')->name('posts.create');
Route::post('/posts','PostsController@store')->name('posts.store');
Route::get('/posts/{id}','PostsController@show')->name('posts.show');

Route::get('/posts/{id}/edit','PostsController@edit')->name('posts.edit');
Route::put('/posts/{id}','PostsController@update')->name('posts.update');

Route::delete('/posts/{id}','PostsController@destroy')->name('posts.destroy');



//Route::resource('projects','ProjectController');





// Route::get('/services',function(){
//   return view('Pages.services');
// });

// Route::get('/posts/{id}/{author}',function($id,$author){  //Routing with parameters
//   return "<h1>The post with id ".$id." has author name ".$author."</h1>";
// });

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

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
 
Route::get('/',[
	'uses' => 'BlogController@index',
	'as' => 'blog',
]);

Route::get('/blog/{posts}',[
	'uses' => 'BlogController@show',
	'as' => 'blog.show',
]);

Route::get('/category/{category}',[
	'uses' => 'BlogController@category',
	'as' => 'category'
]);

Route::get('/hello/{nama}',[
	'uses' => 'BlogController@hello',
	'as'	=> 'blog.hello',
]);

Route::get('/author/{author}',[
	'uses' => 'BlogController@author',
	'as' => 'author'
]);
Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');

Route::put('/backend/blog/restore/{blog}',[
	'uses' 	=> 'Backend\BlogController@restore',
	'as' 	=> 'backend.blog.restore',
]);

Route::delete('/backend/blog/force-destroy/{blog}',[
	'uses' 	=> 'Backend\BlogController@forceDestroy',
	'as' 	=> 'backend.blog.force-destroy',
]);

Route::resource('/backend/blog', 'Backend\BlogController',['as'=>'backend']);

Route::resource('/backend/category', 'Backend\CategoryController',['as'=>'backend']);

Route::get('/backend/user/confirm/{user}',[
	'uses' => 'Backend\UsersController@confirm',
	'as' => 'backend.user.confirm'
]);

Route::resource('/backend/user', 'Backend\UsersController',['as'=>'backend']);
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

Route::get('/', ['as'=>'/', 'uses'=>'LoginController@getLogin']);
Route::post('/login',['as'=>'login','uses'=>'LoginController@postLogin']);

Route::get('/noPermission',function(){
	return view('permission.noPermission');
});
Route::group(['middleware'=>['authen']], function(){
	Route::get('/logout',['as'=>'logout', 'uses'=>'LoginController@getLogout']);
	Route::get('/admin',['as'=>'admin', 'uses'=>'AdminController@dashboard']);
});

Route::group(['middleware'=>['authen','roles'],'roles'=>['admin']],function(){

	Route::get('/student', ['as'=>'manageStudent', 'uses'=>'DataTableController@index']);
	Route::get('/readStudent','StudentController@readData');
	Route::get('/student/showCourse',['as'=>'showCourse', 'uses'=>'StudentController@showCourse']);
	
});




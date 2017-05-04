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
Route::get('/foo',function(){
	return 'get提交';
});
Route::post('/foo',function(){
	return 'post提交';
});
Route::put('/foo',function(){
	return 'put提交';
});
Route::delete('/foo',function(){
	return 'delete提交';
});
Route::match(['get','post'],'/hello',function(){
	return 'hello word';
});
Route::get('test/{id?}/{name?}',function($id=6,$name='刘伟'){
	return 'test'.$id.$name;
});
Route::get('test1/{id?}',function($id=null){
	return 'test1'.$id;
})->where('id','[0-9]+');
Route::get('/user/in','UserController@index');
Route::get('/user/sh','UserController@show');
// 学生信息管理
Route::resource('/stu','stu\StuController');
// 后台学生信息管理
Route::group(['prefix'=>'admin1','middleware'=>'login'],function(){
Route::resource('/demo1','user\UserController');
Route::resource('/demo','admin\AdminController');
//退出
Route::get('admin/over','admin\LoginController@over');
});
// 请求  响应
Route::get('/a','DemoController@request');
Route::get('/b','DemoController@response');
// 上传
Route::get('/upload','upload\UploadController@index');
Route::post('/doupload','upload\UploadController@doupload');
// 登录
Route::get('admin/login','admin\LoginController@index');
Route::post('admin/dologin','admin\LoginController@dologin');
//验证码
Route::get('admin2/captch/{tmp}','admin\LoginController@captch');
Route::get('/home','HomeController@index');


<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', function() {

	return redirect(route('nhanvien.show', Auth::User()->id));

})->middleware('auth');

Route::get('/register', function () {
    return redirect('/login');
});


// Nhóm URL /user/url
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {

	// hiển thị toàn bộ user
	Route::get('/', [

		'as' => 'user',
		'uses' => 'UserController@index'

	]);

	// tạo user mới
	Route::get('/create', 'UserController@create');

	Route::post('/store', [

		'as' => 'user.store',
		'uses' => 'UserController@store'

	]);

	// sửa thông tin user
	Route::get('/edit/{id}', 'UserController@edit');
	Route::post('/update/{id}', [

		'as' => 'user.update',
		'uses' => 'UserController@update'

	]);

	// xoá user
	Route::get('/delete/{id}', 'UserController@destroy');

});


// Nhóm URL /nhanvien/url
Route::group(['prefix' => 'nhanvien', 'middleware' => 'auth'], function() {

	Route::get('/', 'NhanVienController@index');

	// hiện thông tin user sau khi đăng nhập
	Route::get('/{id}', [

		'as' => 'nhanvien.show', 
		'uses' => 'NhanVienController@show'

	])->where('id', '[0-9]+'); 

	Route::post('/updateshow/{id}', [

		'as' => 'nhanvien.updateshow',
		'uses' => 'NhanVienController@updateshow'

	]);

	// tạo user mới
	Route::get('/create', 'NhanVienController@create');

	Route::post('/store', [

		'as' => 'nhanvien.store',
		'uses' => 'NhanVienController@store'

	]);

	// sửa thông tin user
	Route::get('/edit/{id}', 'NhanVienController@edit');
	Route::post('/update/{id}', [

		'as' => 'nhanvien.update',
		'uses' => 'NhanVienController@update'

	]);

	// xoá user
	// Route::get('/delete/{id}', 'NhanvienController@destroy');

});

Route::group(['prefix' => 'luong', 'middleware' => 'auth'], function() {
	
	Route::get('/', [

		'as' => 'luong.home',
		'uses' => 'LuongController@index'

	]);

	Route::post('/upload', [
		'as' => 'luong.upload',
		'uses' => 'LuongController@upload'
		]);

	Route::get('/{id}', [

		'as' => 'luong.view', 
		'uses' => 'LuongController@view'

	])->where('id', '[0-9]+');

	Route::get('/edit/{id}', [

		'as' => 'luong.edit',
		'uses' => 'LuongController@edit'

		])->where('id', '[0-9]+');

	Route::post('/update/{id}', [

		'as' => 'luong.update',
		'uses' => 'LuongController@update'

	]);

	Route::get('/delete/{id}', [

		'as' => 'luong.delete',
		'uses' => 'LuongController@delete'

	]);

});

Route::group(['prefix' => 'bangcap', 'middleware' => 'auth'], function() {

	Route::get('/', [

		'as' => 'bangcap.home',
		'uses' => 'BangcapController@index'

	]);

	Route::get('/create', 'BangcapController@create');

	Route::post('/store', [

		'as' => 'bangcap.create',
		'uses' => 'BangcapController@store'

	]);

	Route::get('/edit/{mabc}', [

		'as' => 'bangcap.edit',
		'uses' => 'BangcapController@edit'

		]);

	Route::post('/update/{mabc}', [

		'as' => 'bangcap.update',
		'uses' => 'BangcapController@update'

	]);

	Route::get('/delete/{mabc}', [

		'as' => 'bangcap.delete',
		'uses' => 'BangcapController@delete'

	]);

});

Route::group(['prefix' => 'chucvu', 'middleware' => 'auth'], function() {

	Route::get('/', [

		'as' => 'chucvu.home',
		'uses' => 'chucvuController@index'

	]);

	Route::get('/create', 'chucvuController@create');

	Route::post('/store', [

		'as' => 'chucvu.create',
		'uses' => 'chucvuController@store'

	]);

	Route::get('/edit/{mapb}', [

		'as' => 'chucvu.edit',
		'uses' => 'chucvuController@edit'

		]);

	Route::post('/update/{mapb}', [

		'as' => 'chucvu.update',
		'uses' => 'chucvuController@update'

	]);

	Route::get('/delete/{mapb}', [

		'as' => 'chucvu.delete',
		'uses' => 'chucvuController@delete'

	]);

});

Route::group(['prefix' => 'chucvu', 'middleware' => 'auth'], function() {

	Route::get('/', [

		'as' => 'chucvu.home',
		'uses' => 'chucvuController@index'

	]);

	Route::get('/create', 'chucvuController@create');

	Route::post('/store', [

		'as' => 'chucvu.create',
		'uses' => 'chucvuController@store'

	]);

	Route::get('/edit/{mapb}', [

		'as' => 'chucvu.edit',
		'uses' => 'chucvuController@edit'

		]);

	Route::post('/update/{mapb}', [

		'as' => 'chucvu.update',
		'uses' => 'chucvuController@update'

	]);

	Route::get('/delete/{mapb}', [

		'as' => 'chucvu.delete',
		'uses' => 'chucvuController@delete'

	]);

});

// Route::get('admin',['middleware'=>'role',function(){
//     return 'Only admin can see this';
// }]);
// Route::get('unauthorized',function(){
//   return 'You are not admin';
// });
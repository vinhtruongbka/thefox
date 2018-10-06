<?php 

Route::get('/', [
	'uses'=>'LayoutController@getIndex',
	'as'=>'home.index',
]);
Route::get('danh-muc/{type}', [
	'uses'=>'LayoutController@getDanhmuc',
	'as'=>'danhmuc',
]);
Route::get('san-pham/{res}', [
	'uses'=>'LayoutController@getSanPham',
	'as'=>'sanpham',
]);
Route::get('/dang-ky', [
	'uses'=>'LayoutController@register',
	'as'=>'register',
]);
Route::post('/dang-ky', [
	'uses'=>'LayoutController@postregister',
	'as'=>'postregister',
]);
Route::post('/dang-nhap', [
	'uses'=>'LayoutController@postlogin',
	'as'=>'postlogin',
]);
Route::get('/dang-xuat', [
	'uses'=>'LayoutController@logout',
	'as'=>'logout',
]);
Route::get('tim-kiem', [
	'uses'=>'LayoutController@timkiem',
	'as'=>'timkiem',
]);

 ?>
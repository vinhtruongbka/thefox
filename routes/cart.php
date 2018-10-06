<?php 
	Route::get('/mua-hang/{id}', [
	'uses'=>'CartController@muahang',
	'as'=>'cart.muahang',
]);
Route::get('/gio-hang', [
	'uses'=>'CartController@giohang',
	'as'=>'cart.giohang',
]);

Route::get('/dat-hang', [
	'uses'=>'CartController@dathang',
	'as'=>'cart.dathang',
]);
Route::post('/dat-hang', [
	'uses'=>'CartController@postdathang',
	'as'=>'postdathang',
]);
Route::get('/thanh-cong', [
	'uses'=>'CartController@thanhcong',
	'as'=>'cart.thanhcong',
]);
Route::get('/xoa/{rowId}', [
	'uses'=>'CartController@xoa',
	'as'=>'cart.xoa',
]);

 ?>
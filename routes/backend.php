<?php 
 Route::get('admin/', [
	'uses'=>'BackendController@getIndex',
	'as'=>'backend.index',
]);
Route::get('admin/login', [
	'uses'=>'BackendController@login',
	'as'=>'backend.login',
]);
Route::post('admin/login', [
	'uses'=>'BackendController@post_login',
	'as'=>'login',
]);
Route::get('admin/add-admin', [
	'uses'=>'BackendController@create_admin',
	'as'=>'backend.add_admin',
]);
Route::post('admin/add-admin', [
	'uses'=>'BackendController@add_admin',
	'as'=>'add_admin',
]);
Route::get('admin/san-pham', [
	'uses'=>'BackendController@getproduct',
	'as'=>'backend.getproduct',
]);
Route::get('admin/danh-muc-san-pham', [
	'uses'=>'BackendController@getcategory',
	'as'=>'backend.getcategory',
]);
Route::get('admin/them-san-pham', [
	'uses'=>'BackendController@addproduct',
	'as'=>'backend.addproduct',
]);
Route::post('admin/them-san-pham', [
	'uses'=>'BackendController@add_product',
	'as'=>'add_product',
]);
Route::get('admin/xoa-san-pham/{id}', [
	'uses'=>'BackendController@xoasanpham',
	'as'=>'backend.xoasanpham',
]);
Route::get('admin/sua-san-pham/{id}', [
	'uses'=>'BackendController@suasanpham',
	'as'=>'backend.suasanpham',
]);
Route::post('admin/sua-san-pham/{id}', [
	'uses'=>'BackendController@sua_sanpham',
	'as'=>'sua_sanpham',
]);
Route::get('admin/sua-danh-muc/{id}', [
	'uses'=>'BackendController@suadanhmuc',
	'as'=>'backend.suadanhmuc',
]);
Route::post('admin/sua-danh-muc/{id}', [
	'uses'=>'BackendController@postsuadanhmuc',
	'as'=>'postsuadanhmuc',
]);
Route::get('admin/danh-sach-don-hang', [
	'uses'=>'BackendController@danhsachdonhang',
	'as'=>'danhsachdonhang',
]);
Route::get('admin/khach-hang', [
	'uses'=>'BackendController@khachhang',
	'as'=>'khachhang',
]);
 ?>
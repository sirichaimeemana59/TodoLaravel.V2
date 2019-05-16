<?php


//Route::get('/test/{num?}/{num1}', function ($num = null , $num1=null) {
//    return ($num . $num1);
//});

Route::get('/','Admin\AdminController@index');
Route::get('/Register','User\UserController@index');
Route::post('insert_profile/form','User\UserController@create');
Route::get('/list_user','User\UserController@show');
Route::post('/update/user_profile','User\UserController@edit');
Route::post('/update/profile','User\UserController@update');
Route::post('/delete/profile','User\UserController@destroy');

Route::get('/firebase','Firebase\FirebaseController@index');

//product
Route::get('product/add_product','Product\ProductController@index');
Route::post('product/insert_product','Product\ProductController@create');
Route::any('/product/edit_product','Product\ProductController@edit');
Route::any('/product/update_product','Product\ProductController@update');
Route::post('product/view_product','Product\ProductController@show');
Route::post('product/delete_product','Product\ProductController@destroy');

//Order Product
Route::get('product/list_product','Order\OrderproductController@index');
Route::post('product/order_product/insert','Order\OrderproductController@create');
Route::get('product/list_order_product','Order\OrderproductController@store');
Route::any('product/view_order_product','Order\OrderproductController@show');
Route::get('product/edit_order_product/{tax?}','Order\OrderproductController@edit');
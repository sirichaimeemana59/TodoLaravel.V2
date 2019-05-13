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
Route::get('product/list_product','Product\ProductController@index');
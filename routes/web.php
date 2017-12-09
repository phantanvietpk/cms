<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');


Route::name('product.show')->get('/product/{slug}', 'ProductController@show');

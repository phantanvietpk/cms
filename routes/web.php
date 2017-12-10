<?php

Route::group([
    'middleware' => ['web'],
], function () {

    Auth::routes();
    Route::get('/', 'HomeController@index')->name('home');

    // Product
    Route::name('product.show')->get('/product/{slug}', 'ProductController@show');

    // Cart
    Route::get('cart','CartController@view')->name('cart.list');
    Route::post('cart/store','CartController@addCart')->name('cart.store');

});
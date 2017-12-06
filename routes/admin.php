<?php

Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::group([
    'middleware' => ['auth:admin', 'must.be.activated:admin'],
], function () {
    Route::get('/', 'HomeController@index')->name('index');

    // Groups and Users
    Route::group([
        'as' => 'accounts.',
        'prefix' => 'accounts',
        'namespace' => 'Account'
    ], function () {
        Route::get('groups/actions', 'GroupActionController@index')->name('groups.actions');
        Route::resource('groups', 'GroupController', ['except' => ['show', 'destroy']]);

        Route::get('users/actions', 'UserActionController@index')->name('users.actions');
        Route::resource('users', 'UserController', ['except' => ['show', 'destroy']]);
        Route::put('users/{user}/photo', 'UserPhotoController@update')->name('users.photo.update');
        Route::delete('users/{user}/photo', 'UserPhotoController@destroy')->name('users.photo.destroy');
    });

    // Pages
    Route::group([
        'namespace' => 'Page'
    ], function () {
    Route::get('pages/actions', 'PageActionController@index')->name('pages.actions');
    Route::resource('pages', 'PageController', ['except' => ['show', 'destroy']]);
    });

    // Product
    Route::group([
        'namespace' => 'Product'
    ], function () {
    Route::resource('products', 'ProductController', ['except' => ['show', 'destroy']]);
    });
});
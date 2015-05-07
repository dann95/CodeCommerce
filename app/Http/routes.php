<?php

/**
 * Fase 3:
 */

Route::group(['prefix' => 'admin' , 'where' => ['id' => '[0-9]+']] , function(){

    # Categories :
    Route::group(['prefix' => 'categories'] , function(){
        Route::get('/' , 'AdminCategoriesController@index');
        Route::get('edit/{id}' , ['uses' => 'AdminCategoriesController@edit' , 'as' => 'categories.edit']);
        Route::get('delete/{id}' , ['uses' => 'AdminCategoriesController@destroy' , 'as' => 'categories.delete']);
        Route::get('create' , ['uses' => 'AdminCategoriesController@create' , 'as' => 'categories.create']);
    });

    # Products :
    Route::group(['prefix' => 'products'] , function(){
        Route::get('/' , 'AdminProductsController@index');
        Route::get('delete/{id}' , ['uses' => 'AdminProductsController@destroy' , 'as' => 'products.delete']);
        Route::get('edit/{id}' , ['uses' => 'AdminProductsController@edit' , 'as' => 'products.edit']);
        Route::get('create' , ['uses' => 'AdminProductsController@create' , 'as' => 'products.create']);
    });
});


/**
 * Demais rotas:
 */

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


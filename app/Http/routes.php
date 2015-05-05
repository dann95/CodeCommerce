<?php

/**
 * Fase 2:
 */
Route::group(['prefix' => 'admin'] , function(){
    Route::get('categories' , 'AdminCategoriesController@index');
    Route::get('products' , 'AdminProductsController@index');
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


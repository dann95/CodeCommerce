<?php


/**
 * Em toda a aplicação , ID => int
 */
Route::group(['where' => ['id' => '[0-9]+']] , function(){


    /**
     * Rotas para Admin :
     */
    Route::group(['prefix' => 'admin' , 'middleware' => 'admin' , 'where' => ['id' => '[0-9]+']] , function(){

        # Categories :
        Route::group(['prefix' => 'categories'] , function(){
            Route::get('/' , ['uses' => 'AdminCategoriesController@index' , 'as' => 'categories.list']);
            Route::get('edit/{id}' , ['uses' => 'AdminCategoriesController@edit' , 'as' => 'categories.edit']);
            Route::get('delete/{id}' , ['uses' => 'AdminCategoriesController@destroy' , 'as' => 'categories.delete']);
            Route::get('create' , ['uses' => 'AdminCategoriesController@create' , 'as' => 'categories.create']);
            Route::post('store' , ['uses' => 'AdminCategoriesController@store' , 'as' => 'categories.store']);
            Route::post('update/{id}' , ['uses' => 'AdminCategoriesController@update' , 'as' => 'categories.update']);
        });

        # Products :
        Route::group(['prefix' => 'products'] , function(){
            Route::get('/' , ['uses' => 'AdminProductsController@index' , 'as' => 'products.list']);
            Route::get('delete/{id}' , ['uses' => 'AdminProductsController@destroy' , 'as' => 'products.delete']);
            Route::get('edit/{id}' , ['uses' => 'AdminProductsController@edit' , 'as' => 'products.edit']);
            Route::get('edit/{id}/images' , ['uses' => 'AdminProductsController@images' , 'as' => 'products.images']);
            Route::post('edit/{id}/images' , ['uses' => 'AdminProductsController@imageStore' , 'as' => 'products.image.store']);
            Route::get('edit/images/delete/{id}' , ['uses' => 'AdminProductsController@destroyImage' , 'as' => 'products.image.delete']);
            Route::get('create' , ['uses' => 'AdminProductsController@create' , 'as' => 'products.create']);
            Route::post('update/{id}' , ['uses' => 'AdminProductsController@update' , 'as' => 'products.update']);
            Route::post('store' , ['uses' => 'AdminProductsController@store' , 'as' => 'products.store']);
        });

        Route::group(['prefix' => 'tags'] , function(){
            Route::get('/' , ['uses' => 'AdminTagsController@index' , 'as' => 'tags.list']);
            Route::get('/create' , ['uses' => 'AdminTagsController@create' , 'as' => 'tags.create']);
            Route::get('/delete/{id}' , ['uses' => 'AdminTagsController@destroy' , 'as' => 'tags.delete']);
            Route::post('store' , ['uses' => 'AdminTagsController@store' , 'as' => 'tags.store']);
        });

    });


    /**
     * Rotas da loja :
     */
     Route::group(['middleware' => 'Cart'] , function() {

         Route::get('/', ['uses' => 'StoreController@index', 'as' => 'store.index']);
         Route::get('/category/{id}-{name?}', ['uses' => 'StoreController@category', 'as' => 'store.category']);
         Route::get('/product/{id}-{name?}', ['uses' => 'StoreController@product', 'as' => 'store.product']);
         Route::get('/tag/{id}-{name?}', ['uses' => 'StoreController@tag', 'as' => 'store.tag.show']);


         Route::get('/cart' , ['uses' => 'CartController@index' , 'as' => 'cart.list']);
         Route::get('/cart/add/{id}' , ['uses' => 'CartController@add' , 'as' => 'cart.add']);
         Route::get('/cart/del/{id}' , ['uses' => 'CartController@del' , 'as' => 'cart.del']);

     });

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
});
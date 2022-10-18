<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes(
    [
        'reset' => false,
        'confirm' => false,
        'verify' => false,
    ]
);

Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

//Маршрути де потрібна авторизація
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'admin'], function(){
        Route::group(['middleware' => 'is_admin'], function(){
            Route::get('/orders', 'OrderController@index')->name('orders.index');
            Route::get('/order/{order}', 'OrderController@show')->name('orders.show');
            Route::resource('categories', 'CategoryController');
            Route::resource('products', 'ProductController');
        });
    });

});



Route::middleware(['set_language'])->group(function () {

    Route::middleware(['auth'])->group(function () {
        Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
            Route::get('/orders', 'PersonOrderController@index')->name('orders.index');
            Route::get('/order/{order}', 'PersonOrderController@show')->name('orders.show');
        });
    });

    //Домашня сторінка
    Route::get('/', 'MainController@home')->name('home');

    //Сторінка товарів зі знижками
    Route::get('/hotprices', 'MainController@hotPrices')->name('hotprices');

    //Сторінка категорії з продуктами
    Route::get('/category/{code}', 'MainController@categories')->name('category');

    //Сторінка продукта
    Route::get('/product/{productCode}', 'MainController@product')->name('product');

    //Зміна мови
    Route::get('/locale/{language}', 'MainController@changeLanguage')->name('changeLanguage');

    //Корзина
    Route::group(['prefix' => 'bakset'], function(){
        Route::post('/add/{product}', 'BasketController@basketAdd')->name('basket-add');
        Route::group(['middleware' => 'basket_not_empty',],function(){
            Route::get('/', 'BasketController@basket')->name('basket');
            Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
            
            Route::post('/remove/{product}', 'BasketController@basketRemove')->name('basket-remove');
            Route::post('/place', 'BasketController@basketConfirm')->name('basket-confirm');
        });
    });

    Route::post('/subscription/{product}', 'MainController@subscribe')->name('subscription');

});


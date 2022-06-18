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

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
    Route::group(['middleware' => 'is_admin'], function(){
        Route::get('/orders', 'AdminController@index')->name('admin-orders');
        Route::resource('categories', 'CategoryController');
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

//Корзина
Route::group(['prefix' => 'bakset'], function(){
    Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');
    Route::group(['middleware' => 'basket_not_empty',],function(){
        Route::get('/', 'BasketController@basket')->name('basket');
        Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
        
        Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
        Route::post('/place', 'BasketController@basketConfirm')->name('basket-confirm');
    });
});




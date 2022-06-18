<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

//Домашня сторінка
Route::get('/', 'MainController@home')->name('home');

//Сторінка товарів зі знижками
Route::get('/hotprices', 'MainController@hotPrices')->name('hotprices');

//Сторінка категорії з продуктами
Route::get('/category/{code}', 'MainController@categories')->name('category');

//Сторінка продукта
Route::get('/product/{productCode}', 'MainController@product')->name('product');

//Корзина
Route::get('/basket', 'BasketController@basket')->name('basket');
Route::get('/basket/place', 'BasketController@basketPlace')->name('basket-place');

Route::post('/basket/add/{id}', 'BasketController@basketAdd')->name('basket-add');
Route::post('/basket/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
Route::post('/basket/place', 'BasketController@basketConfirm')->name('basket-confirm');

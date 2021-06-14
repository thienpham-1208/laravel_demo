<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\HomeController1;
use  App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//frontend
Route::get('category/{category}', 'CategoryController@category')->name('home.category');
Route::get('brand/{brand}', 'BrandProductController@brand')->name('home.brand');
Route::get('product/detail/{name}','ProductController@show')->name('home.product.detail');
//cart
Route::prefix('cart')->middleware('auth')->group(function(){
    Route::get('add/{id}','CartController@addCart')->name('cart.add');
    Route::get('show','CartController@showCart')->name('cart.show');
    Route::post('update/{rowId}', 'CartController@update')->name('cart.update');
    Route::get('delete/{rowId}','CartController@delete')->name('cart.delete');
});
//mail
Route::get('infor', 'MailController@formUser')->middleware('auth');
Route::post('/infor','MailController@sendMail')->name('sendMail');

//backend
Route::prefix('admin')->group(function(){
    Route::get('/','AdminController@showLogin')->name('admin.showLogin');
    Route::post('/','AdminController@login')->name('admin.login');
    Route::get('logout','AdminController@logout')->name('admin.logout');
    //Category
    Route::prefix('category')->group(function(){
        Route::get('/','CategoryController@index')->name('category.index');
        Route::get('add','CategoryController@create')->name('category.create');
        Route::post('add','CategoryController@store')->name('category.store');
        Route::get('edit/{id}','CategoryController@edit')->name('category.edit');
        Route::post('edit/{id}','CategoryController@update')->name('category.update');
        Route::get('delete/{id}','CategoryController@delete')->name('category.delete');
    });
    //BrandProduct
    Route::prefix('brand')->group(function(){
        Route::get('/','BrandProductController@index')->name('brand.index');
        Route::get('add','BrandProductController@create')->name('brand.create');
        Route::post('add','BrandProductController@store')->name('brand.store');
        Route::get('edit/{id}','BrandProductController@edit')->name('brand.edit');
        Route::post('edit/{id}','BrandProductController@update')->name('brand.update');
        Route::get('delete/{id}','BrandProductController@delete')->name('brand.delete');
    });

    //Product
    Route::prefix('product')->group(function(){
        Route::get('/','ProductController@index')->name('product.index');
        Route::get('add','ProductController@create')->name('product.create');
        Route::post('add','ProductController@store')->name('product.store');
        Route::get('edit/{id}','ProductController@edit')->name('product.edit');
        Route::post('edit/{id}','ProductController@update')->name('product.update');
        Route::get('delete/{id}','ProductController@delete')->name('product.delete');
    });
});
   Route::get('test',function(){
        return view('test');
   });
   









Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/','HomeController@logout')->name('home.logout');

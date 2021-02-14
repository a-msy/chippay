<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ChipController@index')->name('page.index');

Auth::routes();

Route::get('/shops/{id}','ChipController@shopdetail')->name('shop.detail');
Route::get('/shopindex','ChipController@shopindex')->name('shop.index');
Route::get('/shopindex/chinese','ChipController@chinese')->name('shop.chinese');
Route::get('/shopindex/japanese','ChipController@japanese')->name('shop.japanese');
Route::get('/shopindex/italian','ChipController@italian')->name('shop.italian');
Route::get('/shopindex/french','ChipController@french')->name('shop.french');
Route::get('/shopindex/etc','ChipController@etc')->name('shop.etc');

Route::get('/menu/{id}','ChipController@menudetail')->name('menu.detail');

Route::get('/ZGGmPFQ-8yBF6VP3LPEbHBxnb','Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('/ZGGmPFQ-8yBF6VP3LPEbHBxnb','Admin\Auth\RegisterController@register')->name('admin.create');

Route::post('/like', 'User\FavController@menuLike')->name('like');
// ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => true,
        'verify'   => true,
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {
        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        Route::post('/chipsend','SendController@chipsend')->name('chipsend');
        Route::post('/home/update/{id}','HomeController@update')->name('home.update');
        Route::get('/home/buy','stripeController@buy')->name('home.buy');
    });
});

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => false,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {
        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        Route::resource('shopmenu', 'ShopController');
        Route::post('home/shopmenu/update/{id}','ShopController@update')->name('home.shopmenu.update');
        Route::post('home/shopmenu/destroy/{id}','ShopController@destroy')->name('home.shopmenu.destroy');
        Route::post('home/update/{id}','HomeController@update')->name('home.update');
        Route::post('home/change/{id}','HomeController@change')->name('home.change');
        Route::post('home/dechange/{id}','HomeController@dechange')->name('home.dechange');
        Route::post('home/done/{id}','HomeController@done')->name('home.done');
        Route::post('home/photo','photoController@photo')->name('photo');
    });

});

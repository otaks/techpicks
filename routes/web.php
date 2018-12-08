<?php

use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * ログインしているユーザーのルーティング
 */
Route::group(['middleware' => ['auth']], function () {
    // この中はログインされている場合のみルーティングされる
    Route::group(['namespace' => 'Front'], function ($router) {
        $router->get('/', 'PageController@index')->name('top');
        $router->resource('picks', 'PickController');

        Route::group(['prefix' => 'mypage'], function ($router) {
            $router->get('/', 'MypageController@index')->name('mypage.index');
        });
    });

    Route::get('/logout', 'UserController@logout');
});

/*
 * Facebook login
 */

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login/facebook', 'LoginController@socialLogin');
    Route::get('login/facebook/callback', 'LoginController@callback');
});

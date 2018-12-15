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
        $router->get('/', 'HomeController@index')->name('top');

        //ピック時コメント入力関連
        $router->get('/picks/create/{postId}', 'PickController@create')->where('postId', '[0-9]+');
        $router->post('/picks', 'PickController@store');

        Route::group(['prefix' => 'mypage'], function ($router) {
            $router->get('/', 'MypageController@index')->name('mypage.index');
        });
    });
    Route::resource('post', 'HomeController');

    Route::get('/logout', 'UserController@logout');
});

/*
 * Facebook login
 */

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login/facebook', 'LoginController@socialLogin');
    Route::get('login/facebook/callback', 'LoginController@callback');
});

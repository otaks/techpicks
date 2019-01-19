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
        $router->get('/picks/delete/{pickId}/{postId}', 'PickController@destroy')->where('pickId', '[0-9]+')->where('postId', '[0-9]+');

        $router->get('post/create', 'PostController@create')->name('post.create');
        Route::group(['prefix' => 'mypage'], function ($router) {
            $router->get('/', 'MypageController@index')->name('mypage.index');
        });

        //記事詳細画面
        Route::get('posts/detail/{postId}', 'PostDetailController@show')->where('postId', '[0-9]+');
        $router->get('posts/create', 'PostController@create');
        $router->post('posts/create', 'PostController@store');

        $router->get('posts/detail/comments/{postId}', 'PostDetailController@getPicksByPostId')->where('postId', '[0-9]+');

        $router->get('posts/detail/like/status/{pickId}/{userId}', 'PostDetailController@checkLiked')->where(['pickId' => '[0-9]+', 'userId' => '[0-9]+']);
        //"いいね"増加
        $router->get('posts/detail/increment/{pickId}/{userId}', 'PostDetailController@incrementLike')->where(['pickId' => '[0-9]+', 'userId' => '[0-9]+']);
        //"いいね"減少
        $router->get('posts/detail/decrement/{pickId}/{userId}', 'PostDetailController@decrementLike')->where(['pickId' => '[0-9]+', 'userId' => '[0-9]+']);
    });

    Route::get('/logout', 'UserController@logout');
});

/*
 * Facebook login
 */
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebookProvider');
Route::get('facebook/callback', 'Auth\LoginController@handleFacebookProviderCallback');

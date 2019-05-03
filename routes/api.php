<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ogps/analysis', 'Api\OgpController@analysis');

Route::get('/', function(){ return 'helloworld';});

Route::post('auth/login', function(Request $request) {
    $cred = $request->only('email', 'password');

    clock($cred);

    if (auth()->attempt($cred)) {

        auth()->user()->tokens()->delete();
        $token = auth()->user()->createToken('SPA');

        return response()->json([
            'access_token' => $token->accessToken,
        ]);
    }

    clock(2);

    return response()->json(['Unauthorized.'], \Illuminate\Http\Response::HTTP_UNAUTHORIZED);
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('auth/user', function(Request $request) {
        return auth()->user();
    });
});


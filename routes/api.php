<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'Api\LoginController@login');
Route::post('admin/login', 'Admin\LoginController@login');
Route::post('admin/logout', 'Admin\LoginController@logout');

Route::middleware('auth:admin')->get('admin', 'Admin\LoginController@getAdmin');
Route::middleware('auth:admin')->get('test', function() {
    if (Auth::check()) {
        return Auth::user();
    } else {
        return ['asjdhsakjh'];
    }
});

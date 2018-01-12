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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('banners', 'App\Http\Controllers\API\V1\BannersController@index');
    $api->get('categories', 'App\Http\Controllers\API\V1\CategoriesController@index');
});

$api->version('v2', function ($api) {
    $api->get('banners', 'App\Http\Controllers\API\V2\BannersController@index');
    $api->get('categories', 'App\Http\Controllers\API\V2\CategoriesController@index');
});
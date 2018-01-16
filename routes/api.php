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
    $api->group(['namespace' => 'App\Http\Controllers\API\V1'], function ($api) {
        $api->get('banners', 'BannersController@index');
        $api->get('categories', 'CategoriesController@index');
        $api->get('categories/feature', 'CategoryFeatureController@index');
        $api->get('categories/{id}', 'CategoriesController@detail');
        $api->get('categories/{id}/products', 'CategoryProductController@index');
        $api->get('products', 'ProductsController@index');
        $api->get('flashsale', 'FlashSaleController@index');

    });
});

/*
$api->version('v2', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers\API\V2'], function ($api) {
        $api->get('banners', 'BannersController@index');
        $api->get('categories', 'CategoriesController@index');
    });
});
*/
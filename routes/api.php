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

 Route::post('login', 'API\UserController@login');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'prefix' => ''
], function () {
   
    Route::post('signup', 'API\UserController@signup');
    
});

Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'API\UserController@logout');
        Route::get('user', 'API\UserController@user');
        Route::apiResource('institution', 'API\InstitutionController');
        Route::apiResource('examresult', 'API\ExamResultController');
    });
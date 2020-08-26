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

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');

// do it later
//Route::get('/scenarios/{slug}', 'Api\ScenariosController@show')->name('scenarios.show');



Route::apiResource('/scenarios', 'Api\ScenariosController');
//->middleware('auth:api');
Route::apiResource('/knowledgeComponents', 'Api\KnowledgeComponentsController'); //->middleware('auth:api');



Route::get('/interactions/{id}', 'Api\InteractionsController@show');
Route::get('/interactions',  'Api\InteractionsController@index');
Route::post('/interactions', 'Api\InteractionsController@store');

Route::post('/protocols/newSession', 'Api\GameProtocolsController@newSession');
Route::get('/protocols/start', 'Api\GameProtocolsController@start');

Route::get('/gamedata/session/{id}/defintion', 'Api\GameDataController@getSessionDefintionCount')->name('gamedata.sessionDefintionCount');
Route::get('/gamedata/game/defintion', 'Api\GameDataController@getGameDefintionCount')->name('gamedata.gameDefintionCount');
Route::get('/gamedata/events/{type}/', 'Api\GameDataController@traceEvents');
Route::get('/gamedata/session/{sessionid}/events/{type}/', 'Api\GameDataController@sessionEvents');

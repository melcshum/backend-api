<?php

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

Route::get('/', function () {

    return App\Interaction
        ::with([
             'interaction_actor',
             'interaction_action',
            'interaction_object',
            'interaction_object.interaction_definition',
            'interaction_result',
            'interaction_result.interaction_extensions',
            'game_session'
        ])
        //->where('game_session_id', '=', '1')
       // ->where('type', '=', 'GameObject')
        ->get()
      //  ->groupby('action_name')
      ;
});

//Route::get('/', 'GamesController@index' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');


// for showing to teacher / student
Route::get('/experience', 'ExperienceController@index');


Route::get('/games', 'GamesController@index')->name('games.index');
Route::get('/games/{gameslug}', 'GamesController@show')->name('games.show');
Route::get('/games/{gameslug}/gamesessions/', 'GamesController@showGameSessions')->name('games.gamesessions');

Route::get('/profiles', 'ProfilesController@index');
Route::resource('profiles', 'ProfilesController');

Route::get('/game_sessions', 'GameSessionsController@index');
Route::resource('game_sessions', 'GameSessionsController');

// knowledgeComponent
Route::get('/KnowledgeComponents', 'KnowledgeComponentsController@index');
Route::resource('knowledgeComponents', 'KnowledgeComponentsController');


// scenarios and prefabs
Route::get('/scenarios', 'ScenariosController@index');
Route::get('/scenarios/name/{name}', 'ScenariosController@showByName')->name('scenarios.showbyname');
Route::resource('scenarios', 'ScenariosController');
Route::get('/prefab', 'PrefabsController@index');
Route::resource('prefabs', 'PrefabsController');


// import and export
// to it later
Route::get('export', 'MyController@export')->name('export');
Route::get('importExportView', 'MyController@importExportView');
Route::post('import', 'MyController@import')->name('import');


Route::get('/{any}', function () {
    return view('/landing......');
})->where('any', '.*');

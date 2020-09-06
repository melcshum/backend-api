<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Collection;

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

Route::get('/chart', function () {
    return view('charts.index');
});

Route::get('/test', function () {

    // $data = new Collection([
    //     10 => ['user' => 1, 'skill' => 1, 'roles' => ['Role_1', 'Role_3']],
    //     20 => ['user' => 2, 'skill' => 1, 'roles' => ['Role_1', 'Role_2']],
    //     30 => ['user' => 3, 'skill' => 2, 'roles' => ['Role_1']],
    //     40 => ['user' => 4, 'skill' => 2, 'roles' => ['Role_2']],
    // ]);

    // $result = $data->groupBy([
    //     'skill',
    //     function ($item) {
    //         return $item['roles'];
    //     },
    // ], $preserveKeys = true);
    $result = App\Interaction::
        where('game_session_id', '=', '3')->get()->
        mapToGroups(function ($item, $key) {
            return [$item['short_name'] => $item['time_taken']];
        });
$data=[];
        foreach ($result as $key => $value){
           array_push($data,[ $key => $result->get($key)->avg()]);
         //   echo     $key. " => ";
     //    echo  $result->get($key)->avg()  ."<br>";

     //    echo   $result->get( $key). "<br>";
        }
        //         ->groupby(
        //             'definition_name'
        //              ,
        //         //    function ($item) {
        //         //        return $item['result_name'];
        //         //    },
        //             $preserveKeys = true
        //         )
    ;


    //     ;

    //$g=$g::p('time_taken','definition_name')->get();


    //     ->groupBy(
    //         function ($item, $key) {
    //             return $item['short_name'];
    //         }
    //     )->map->count();

  //  return ($result);
});

Route::get('/', 'GamesController@index');

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


Route::get('/traces', 'TracesController@index')->name('traces.index');



// import and export
// to it later
Route::get('export', 'MyController@export')->name('export');
Route::get('importExportView', 'MyController@importExportView');
Route::post('import', 'MyController@import')->name('import');


Route::get('/{any}', function () {
    return view('/landing......');
})->where('any', '.*');

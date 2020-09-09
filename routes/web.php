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



    // $time_limits = App\Scenario::all()->mapToGroups(function ($item, $key) {
    //     return [
    //         $item['name'] => $item['time_limit']
    //     ];
    // });


    // $data = App\Interaction::all()->where('result_name', '=', 'completed')->mapToGroups(function ($item, $key) {
    //     return [$item['short_name'] => $item['time_taken']];
    // });

    // $result = collect([]);
    // foreach ($time_limits as $key => $value) {
    //     //  if ($time_limits->contains($key)) {
    //     $time_taken =  $data->get($key);
    //     if ($time_taken != null) {

    //         $result->push(
    //             collect(["name" =>  $key, "time_limit" => $value])
    //                 ->merge(['time_taken' => $time_taken])
    //         );
    //     } else {
    //         $result->push(
    //             collect(["name" =>  $key, "time_limit" => $value])
    //         );
    //     }
    //     //  }
    // }

    // return $result;

    // $result = App\Interaction::where('game_session_id', '=', '3')->get()
    //     ->where('result_name', '=', 'completed')
    //     ->mapToGroups(function ($item, $key) {
    //         return [
    //             $item['short_name'] => $item['select']  + $item['drag'],
    //         ];
    //     });

    // $data = Collect();

    // foreach ($result as $key => $value) {
    //     $data->push(
    //         [ $key => [
    //             ["max" => $result->get($key)->max()],
    //             ["median" => $result->get($key)->median()],
    //             ["min" => $result->get($key)->min()],
    //             ["average" => $result->get($key)->avg()]
    //         ]]
    //     );
    //   echo     $key. " => ";
    //    echo  $result->get($key)->avg()  ."<br>";

    //    echo   $result->get( $key). "<br>";
    // }
    //  return $data;
    //     //     $result = App\Interaction::
    //         where('game_session_id', '=', '3')->get()->
    //         mapToGroups(function ($item, $key) {
    //             return [$item['short_name'] => $item['time_taken']];
    //         });
    //      $data=Collect([]);
    //         foreach ($result as $key => $value){
    //            array_push($data,[ $key => $result->get($key)->avg()]);
    //   echo     $key. " => ";
    //    echo  $result->get($key)->avg()  ."<br>";

    //    echo   $result->get( $key). "<br>";
    //   }
    //         ->groupby(
    //             'definition_name'
    //              ,
    //         //    function ($item) {
    //         //        return $item['result_name'];
    //         //    },
    //             $preserveKeys = true
    //         )
    // ;


    //     ;

});

Route::get('/', 'GamesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');


// for statistic to teacher / student
Route::get('/experience', 'ExperienceController@index');
Route::get('/timestatistic', 'ExperienceController@timestatistic');


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
    return view('welcome');
})->where('any', '.*');

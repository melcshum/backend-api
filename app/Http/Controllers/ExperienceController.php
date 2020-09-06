<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interaction;
use App\Scenario;

class ExperienceController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {


        // $interactions = App\Interaction::all()->groupBy('interaction_action.name');
        $interactions = Interaction::with(
            [
                'interaction_actor',
                'interaction_action',
                'interaction_object',
                'interaction_object.interaction_definition',
                'interaction_result',
                'interaction_result.interaction_extensions',
                'game_session'
            ]
        )->paginate(20);
        return view('gamedata.index', compact('interactions'));
    }

    public function timestatistic()
    {

        $scenarios = Scenario::all();
        $interactions = Interaction::all()->where('result_name', '=', 'completed')
            ->mapToGroups(function ($item, $key) {
                return [$item['short_name'] => $item['time_taken']];
            });
        $data = collect();

        foreach ($interactions as $key => $value) {
            $data =  $data->merge([$key => $interactions->get($key)->avg()]);
        }

        $results = collect([]);
        foreach ($scenarios as $key => $value) {

            $time_taken = $data->get($value->name);


            if ($time_taken != null) {
                $value->time_taken = $time_taken;
            }
            $results->push(
                $time_taken
            );
        }
        return view('gamedata.showTimeStatistic', compact('scenarios'));
    }
}

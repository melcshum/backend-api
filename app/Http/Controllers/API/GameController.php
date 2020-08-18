<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Scenario;
use App\Http\Resources\GameResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToArray;

class GameController extends BaseController
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function start()
    {
        $ss = [];
        $scenarios = Scenario::with('prefabs')->get()->all();

        $ss = array_merge($ss, $scenarios);

        $scenarios = Scenario::with('prefabs')->where("name", "like", "BasicCard%")->get()->all();

        for ($i = 0; $i < 5; $i++) {
            $ss = array_merge($ss, $scenarios);
        }


        return  $this->sendResponse(
            GameResource::collection($ss),
            "Retrieved successfully"
        );
    }
}

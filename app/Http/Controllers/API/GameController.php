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
        $scenarios = Scenario::with('prefabs')->get();
        $ss = array_merge($ss, $scenarios->all());

        $scenarios = Scenario::with('prefabs')->where("name", "like", "BasicCard%")->get();

        for ($i = 0; $i < 5; $i++) {
            $ss = array_merge($ss, $scenarios->all());
        }


        return  $this->sendResponse(
            GameResource::collection($ss),
            "Retrieved successfully"
        );
    }
}

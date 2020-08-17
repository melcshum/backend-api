<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Scenario;
use App\Http\Resources\GameResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GameController extends BaseController
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function start()
    {
        $scenarios = Scenario::with('prefabs')->get();
        return  $this->sendResponse(
            GameResource::collection($scenarios),
            "Retrieved successfully"
        );
    }
}

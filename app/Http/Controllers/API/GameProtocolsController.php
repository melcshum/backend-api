<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use App\Interaction;
// use App\InteractionActor;
// use App\InteractionAction;
// use App\InteractionObject;
use App\InteractionDefinition;
// use App\InteractionResult;
// use App\InteractionExtension;
use App\Game;
use App\User;
use App\Profile;
use App\GameSession;
use App\Scenario;

use App\Http\Resources\InteractionResource;
use App\Http\Resources\GameSessionResource;
use App\Http\Resources\GameResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class GameProtocolsController extends BaseController
{
    public function __construct()
    {
    }

    public function newSession(Request $request)
    {

        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        // tempoarily use the session_id username + number of session
        //
        $user = User::with('profile')->where('email', '=',  $request->input('email'))->get()->first();
        $count = Profile::where('user_id', '=', $user->id)->get()->first()->game_sessions()->count();


        $game = Game::find($request->input('game_id'));

        $sname = Str::slug($user->name) . "_" . $game->slug .  "_" . $count++;

        $session = $user->profile->game_sessions()
            ->save(
                GameSession::make([
                    'session'  => $sname,
                    'game_id' => $game->id
                ])
            );



        return $this->sendResponse(
            ["session" =>
                [
                    "session" => $sname,
                    "game_id" => $game->id,
                    "playername" =>  Str::slug($user->name)
                ]
            ],
            'Session Started'
        );
    }

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

        for ($i = 0; $i < 10; $i++) {
            $ss = array_merge($ss, $scenarios);
        }

        $scenarios = Scenario::with('prefabs')->where("name", "like", "StringAssignment%")->get()->all();

        for ($i = 0; $i < 5; $i++) {
            $ss = array_merge($ss, $scenarios);
        }
        $scenarios = Scenario::with('prefabs')->where("name", "like", "IntegerAssignment%")->get()->all();

        for ($i = 0; $i < 5; $i++) {
            $ss = array_merge($ss, $scenarios);
        }

        $scenarios = Scenario::with('prefabs')->where("name", "like", "BasicStatments%")->get()->all();

        for ($i = 0; $i < 5; $i++) {
            $ss = array_merge($ss, $scenarios);
        }


        $scenarios = Scenario::with('prefabs')->where("name", "like", "ForLoop%")->get()->all();

        for ($i = 0; $i < 3; $i++) {
            $ss = array_merge($ss, $scenarios);
        }


        return  $this->sendResponse(
            ['scenarios' =>  GameResource::collection($ss)],

            "Retrieved successfully"
        );
    }
}

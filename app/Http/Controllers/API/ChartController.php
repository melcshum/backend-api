<?php

namespace App\Http\Controllers\Api;

use App\GameSession;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Interaction;
// use App\InteractionActor;
// use App\InteractionAction;
// use App\InteractionObject;
use App\InteractionDefinition;
// use App\InteractionResult;
// use App\InteractionExtension;
// use App\Game;
// use App\User;
// use App\Profile;
use App\Http\Resources\InteractionResource;
use App\Http\Resources\GameSessionResource;
use Illuminate\Support\Str;


class ChartController extends BaseController
{
    public function Chartjs()
    {
        $month = array('Jan', 'Feb', 'Mar', 'Apr', 'May');
        $data  = array(5, 2, 3, 4, 5);
        $label  = 'xyz';
        return response()->json(['month' => $month, 'data' => $data, 'label' => $label]);
    }
}

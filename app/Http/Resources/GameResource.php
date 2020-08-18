<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'scenarioID' => $this->name,
            'pgrefabName' => $this->prefabs[0]->name,
            'difficultyRate' => $this->difficulty_rate,
            'timeLimit' => $this->time_limit,
            'kFactor' => $this->k_factor,
            'uncertainty' => $this->uncertainty,
            'bossCanUse' => $this->prefabs[0]->boss_can_use == 1 ? true : false,

        ];

        //  return parent::toArray($request);
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ObjectResource extends JsonResource
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
            // 'id' => $this->id,
            'name' => $this->name,
            'definition' => new DefinitionResource($this->interaction_definition),
            'scenario_difficulty' => new DifficultyResource($this->scenario_difficulty),
            'player_difficulty' => new DifficultyResource($this->player_difficulty)
        ];
        return parent::toArray($request);
    }
}

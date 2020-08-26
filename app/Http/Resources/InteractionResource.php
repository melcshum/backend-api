<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InteractionResource extends JsonResource
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

            'title' => $this->title,
            'type'  => $this->type,
            'session_id' => $this->session,
            'actor' => new ActorResource($this->interaction_actor),
            'verb'  => new ActionResource($this->interaction_action),
            'object' => new ObjectResource($this->interaction_object),
            'result' => new ResultResource($this->interaction_result),
            'timestamp'  => $this->created_at,
        ];
        // return parent::toArray($request);
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DifficultyResource extends JsonResource
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
            'rating' => $this->rating,
            'uncertainty' => $this->uncertainty,
            'k_factor' => $this->k_factor,
            'play_count' => $this->play_count,
        ];
      //  return parent::toArray($request);
    }
}

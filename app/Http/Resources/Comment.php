<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class comment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'article_id' => $this->article_id,
            'user_id' => $this->user_id,
            'likes' => $this->likes,
            'unlikes' => $this->unlikes,
            'created_at' => $this->created_at
        ];
    }
}

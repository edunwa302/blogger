<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
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
            'user_id' => $this->user_id,
            'title' => $this->title,
            'body' => $this->body,
            'comments' => $this->article_comments_count
        ];
    }

    public function with($request) {
        return [
            'version' => '1.0.0',
            'author_url' => url('http://nedStack.com.ng')
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriseResources extends JsonResource
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
            'Parent_id'=>$this->Parent_id,
            'name' =>$this->name,
            'image_cate' =>$this->image_cate,
            'created_at' =>$this->created_at,
        ];
    }
}
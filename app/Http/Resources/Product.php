<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'features'    => $this->features,
            'price'       => $this->price,
            'keywords'    => $this->keywords,
            'url'         => $this->url,
            'category_id' => $this->category_id,
            'subcategory' => $this->subcategory
        ];
    }
}

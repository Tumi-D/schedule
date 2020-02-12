<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $defaultData = parent::toArray($request);
        $additionalData = [
            'role' => $this->roles->first(),
            'permisssion' => $this->permissions,

        ];
        return array_merge($defaultData, $additionalData);
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author' => 'Chris Debrah'
        ];
    }
}

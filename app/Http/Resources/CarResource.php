<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'Id_car'          => $this->Id_car,
            'URL_pic'         => $this->URL_pic,
            'CarYear'         => $this->CarYear,
            'CarBrandName'    => $this->CarBrandName,
            'CarBrandGenName' => $this->CarBrandGenName,
            'CarEngine'       => $this->CarEngine,
            'CarMile'         => $this->CarMile,
            'CarEvaID'        => $this->CarEvaID,
            'Price'        => $this->Price,
            'Monthly'        => $this->Monthly,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user' => $this->user,
            'slot' => $this->slot,
            'date' => Carbon::parse($this->reservation_date)->format('Y-m-d')
        ];
    }
}

<?php

namespace App\UseCases;

use App\Http\Resources\ReservationResource;
use App\Http\Resources\SlotResource;
use App\Models\Reservation;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SlotListUseCase
{
    public function getAvailableSlots(Carbon $date, int $pitch_id): ResourceCollection
    {
        $booked_slots = Reservation::where('reservation_date', $date)->pluck('slot_id');
        $availableSlots = Slot::where('pitch_id', $pitch_id)->whereNotIn('id', $booked_slots)->get();
        return SlotResource::collection($availableSlots);
    }

    public function bookPitchSlot($data): JsonResource
    {
        $reservation = new Reservation();
        $reservation->slot_id = $data['slot_id'];
        $reservation->user_id = 1;// must use auth()->id() instead;
        $reservation->reservation_date = $data['reservation_date'];
        $reservation->save();
        return new ReservationResource($reservation);
    }

    public function slotAvailable(int $slot_id, Carbon $date): bool
    {
        if (Reservation::where('slot_id', $slot_id)
            ->whereDate('reservation_date', $date)->first()) {
            return false;
        }
        return true;
    }
}

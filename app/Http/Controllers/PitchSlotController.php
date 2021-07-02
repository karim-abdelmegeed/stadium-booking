<?php

namespace App\Http\Controllers;

use App\UseCases\SlotListUseCase;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PitchSlotController extends Controller
{
    public function getSlots(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date_format:Y-m-d',
            'pitch_id' => 'required|exists:pitches,id'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $slots = (new SlotListUseCase())->getAvailableSlots(Carbon::parse($request->date), $request->pitch_id);
        return response()->json($slots, 200);
    }

    public function BookSlot(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'reservation_date' => 'required|date_format:Y-m-d',
            'slot_id' => 'required|exists:slots,id'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $validate_slot = (new SlotListUseCase())
            ->slotAvailable($request->slot_id,
                Carbon::parse($request->reservation_date));
        if (!$validate_slot) {
            return response()->json("slot not available", 422);

        }
        /*
      * TODO
         * implement authentication to get user id
         * it is better to separate validation in form Request and user validated request
         * rather than request all
      */
        $reservation = (new SlotListUseCase())->bookPitchSlot($request->all());
        return response()->json($reservation, 200);
    }
}

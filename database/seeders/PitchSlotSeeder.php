<?php

namespace Database\Seeders;

use App\Models\Pitch;
use App\Models\Slot;
use Illuminate\Database\Seeder;

class PitchSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_pitch = Pitch::first();
        $last_pitch = Pitch::latest()->first();
        $slots = [
            [
                'pitch_id' => $first_pitch->id,
                'name' => 'slot 1',
                'type' => 1
            ],
            [
                'pitch_id' => $last_pitch->id,
                'name' => 'slot 2',
                'type' => 2
            ],
        ];
        Slot::insert($slots);

    }
}

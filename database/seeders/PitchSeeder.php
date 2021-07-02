<?php

namespace Database\Seeders;

use App\Models\Pitch;
use App\Models\Stadium;
use Illuminate\Database\Seeder;

class PitchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_stadium = Stadium::first();
        $last_stadium = Stadium::Latest()->first();
        $pitches = [
            [
                'name' => 'pitch 1',
                'stadium_id' => $first_stadium->id
            ],
            [
                'name' => 'pitch 2',
                'stadium_id' => $first_stadium->id
            ],
            [
                'name' => 'pitch 1',
                'stadium_id' => $last_stadium->id
            ],
            [
                'name' => 'pitch 2',
                'stadium_id' => $last_stadium->id
            ],

        ];
        Pitch::insert($pitches);
    }
}

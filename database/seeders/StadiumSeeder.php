<?php

namespace Database\Seeders;

use App\Models\Stadium;
use Illuminate\Database\Seeder;

class StadiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stadiums = [
            [
                'name' => 'Stamford Bridge'
            ],
            [
                'name' => 'San Siro'
            ]
        ];
        Stadium::insert($stadiums);
    }
}

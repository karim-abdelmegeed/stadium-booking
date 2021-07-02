<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->name='karim';
        $user->email='karim@mail.com';
        $user->password=bcrypt('123456');
        $user->save();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id_history_posyandu' => 1,
            'username' => 'deaoktavia',
            'password' => '123456'
        ]);

        User::create([
            'id_history_posyandu' => 1,
            'username' => 'nadyalovita',
            'password' => '123456'
        ]);
    }
}

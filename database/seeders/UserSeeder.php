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
            'name' => 'Dea Oktavia',
            'email' => 'dea.oktavia-2020@vokasi.unair.ac.id',
            'password' => 'Janganlupalagi13'
        ]);

        User::create([
            'name' => 'Nadya Lovita Sari',
            'email' => 'nadya.lovita.sari-2020@vokasi.unair.ac.id',
            'password' => '@nadya0604'
        ]);
    }
}

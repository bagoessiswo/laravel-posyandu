<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'id_role' => 1,
            'id_user' => 1
        ]);

        UserRole::create([
            'id_role' => 1,
            'id_user' => 2
        ]);
    }
}

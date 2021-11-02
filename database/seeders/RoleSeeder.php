<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => 'Super Admin'
        ]);

        Role::create([
            'role' => 'Admin'
        ]);

        Role::create([
            'role' => 'User'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\news;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
        ]);
    }
}

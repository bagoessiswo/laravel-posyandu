<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelurahan;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelurahan::create([
            'id_kecamatan' => 1,
            'kelurahan' => 'Tambakrejo'
        ]);
    }
}

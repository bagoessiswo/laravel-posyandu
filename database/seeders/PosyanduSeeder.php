<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posyandu;

class PosyanduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Posyandu::create([
            'id_kelurahan' => 1,
            'nama_posyandu' => 'Anak Gemilang',
            'alamat_posyandu' => 'Tambak Padi No. 15'
        ]);
    }
}

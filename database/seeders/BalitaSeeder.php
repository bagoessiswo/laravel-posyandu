<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Balita;

class BalitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Balita::create([
            'id_posyandu' => 1,
            'nama_balita' => 'Lorem',
            'nik_orang_tua' => '0000000000000000',
            'nama_orang_tua' => 'Ipsum',
            'tgl_lahir_balita' => '2021-11-01',
            'jenis_kelamin_balita' => 'l',
            'status' => 1,
            'image' => null
        ]);
    }
}

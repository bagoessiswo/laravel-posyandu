<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistoryPosyandu;

class HistoryPosyanduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HistoryPosyandu::create([
            'id_balita' => 1,
            'tgl_posyandu' => '2021-11-01',
            'berat_badan_balita' => 8.50,
            'tinggi_badan' => 45.32
        ]);
    }
}

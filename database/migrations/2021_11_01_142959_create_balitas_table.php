<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balita', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_posyandu')->constrained('posyandu');
            $table->string('nama_balita', 50);
            $table->string('nik_orang_tua', 16);
            $table->string('nama_orang_tua', 50);
            $table->date('tgl_lahir_balita');
            $table->char('jenis_kelamin_balita', 1);
            $table->smallInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balita');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPosyandusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_posyandu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_balita')->constrained('balita');
            $table->date('tgl_posyandu');
            $table->float('berat_badan_balita', 8, 2);
            $table->float('tinggi_badan', 8, 2);
            $table->string('image', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_posyandu');
    }
}

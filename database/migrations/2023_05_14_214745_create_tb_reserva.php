<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_reserva', function (Blueprint $table) {
            $table->increments('cd_reserva');
            $table->date('dt_reserva');
            $table->time('hr_reserva');
            $table->unsignedBigInteger('cd_usuario');
            $table->unsignedBigInteger('cd_mesa');
            $table->foreign('cd_usuario')->references('cd_usuario')->on('tb_usuario');
            $table->foreign('cd_mesa')->references('cd_mesa')->on('tb_mesa');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_reserva');
    }
};

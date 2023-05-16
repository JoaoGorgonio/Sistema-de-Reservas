<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mesa', function (Blueprint $table) {
            $table->unsignedBigInteger('cd_mesa')->autoIncrement();
            $table->longtext('ds_mesa');
            $table->string('im_mesa', 255);
            $table->integer('qt_assentos');
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
        Schema::dropIfExists('tb_mesa');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_usuario', function (Blueprint $table) {
            $table->unsignedBigInteger('cd_usuario')->autoIncrement();
            $table->string('nm_usuario', 120);
            $table->string('cd_email', 320);
            $table->string('cd_senha', 255);
            $table->boolean('ic_admin')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_usuario');
    }
};

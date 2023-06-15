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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->integer('n_estrellas');
            $table->string('contenido');
            $table->unsignedBigInteger('usuario_valorador');
            $table->unsignedBigInteger('producto_valorado');
            $table->foreign('usuario_valorador')->references('id')->on('users');
            $table->foreign('producto_valorado')->references('id')->on('productos');
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
        Schema::dropIfExists('assessments');
    }
};

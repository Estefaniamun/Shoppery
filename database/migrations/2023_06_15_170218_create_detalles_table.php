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
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->float('total');
            $table->unsignedBigInteger('compra');
            $table->unsignedBigInteger('producto');
            $table->unsignedBigInteger('descuento');
            $table->foreign('compra')->references('id')->on('compras');
            $table->foreign('producto')->references('id')->on('productos');
            $table->foreign('descuento')->references('id')->on('descuentos');
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
        Schema::dropIfExists('detalles');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->integer('total');
            $table->integer('autoriza');
            $table->integer('user_id');
            $table->integer('cliente_id');
            $table->boolean('factura');
            $table->integer('comision_id');
            $table->integer('fpago_id');
            $table->char('CVyFP');
            $table->char('descripcion')->nullable();
            $table->char('devoluciones')->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
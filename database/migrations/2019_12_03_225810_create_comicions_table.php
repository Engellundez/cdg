<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comicions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('codigo_cliente');
            $table->char('Tipo_cliente');
            $table->char('descripción');
            $table->integer('comision');
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
        Schema::dropIfExists('comicions');
    }
}

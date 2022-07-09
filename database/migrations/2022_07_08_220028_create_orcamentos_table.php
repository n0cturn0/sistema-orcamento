<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps('dataentrada');
            $table->timestamps('previsaosaida');
            $table->string('modelo');
            $table->string('marca');
            $table->string('operador');
            $table->string('cliente');
            $table->string('item');
            $table->string('itemquantidade');
            $table->double('itempreco');
            $table->double('valortoral');
            $table->integer('status');
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
        Schema::dropIfExists('orcamentos');
    }
}

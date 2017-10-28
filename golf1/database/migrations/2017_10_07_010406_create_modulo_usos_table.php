<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuloUsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo_usos', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('init_time');
            $table->datetime('end_time');
            $table->boolean('status');
            $table->integer('minutos');
            $table->string('nombre_cliente');
            $table->integer('modulo_id')->references('id')->on('modulos');
            $table->integer('user_id')->references('id')->on('users');
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
        Schema::drop('modulo_usos');
    }
}

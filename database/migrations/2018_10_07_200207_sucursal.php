<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sucursal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('Sucursal', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->increments('id_sucursal')->primary();
            $table->char('Direccion',40);
            $table->char('Colonia',30);
            $table->integer('CP');
            $table->double('Telefono',10,0);
            $table->char('Correo',35);
            $table->dateTime('FechaCreacion')->default(\Carbon\Carbon::now());;
            $table->foreign('user_id')->references('id')->on('users');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::drop('Sucursal');*/
    }
}

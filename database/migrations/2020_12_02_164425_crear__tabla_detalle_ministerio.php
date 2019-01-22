<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDetalleMinisterio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ministerio', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('miembros_id');
            $table->foreign('miembros_id')->references('id')->on('miembros')->onDelete('cascade');

            $table->unsignedInteger('ministerio_id');
            $table->foreign('ministerio_id')->references('id')->on('ministerio')->onDelete('cascade');

            $table->unsignedInteger('roles_id');
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');
          
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
        //
    }
}

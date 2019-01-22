<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDetalleFamilia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_familia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('miembros_id');
            $table->foreign('miembros_id')->references('id')->on('miembros')->onDelete('cascade');

            $table->unsignedInteger('familia_id');
            $table->foreign('familia_id')->references('id')->on('familia')->onDelete('cascade');

            $table->string('parentesco');

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

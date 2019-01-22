<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaObservacionesMiembros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembro_observaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('miembros_id');
            $table->foreign('miembros_id')->references('id')->on('miembros')->onDelete('cascade');
            $table->string('nombre', 100) ;
            $table->date('fecha');
            $table->text('descripcion');
            $table->unsignedInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('miembros')->onDelete('set null'); 
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMiembros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido1');
            $table->string('apellido2')->nullable();
            $table->string('numerodocumento')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->string('lugarnacimiento')->nullable();
            $table->string('nacionalidad')->nullable();    
            $table->string('email')->unique()->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();            
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->string('direccion');
            $table->string('codigopostal')->nullable();
            $table->string('genero');   
            $table->string('fotoperfil')->nullable();
            $table->timestamps();
        });

        Schema::create('miembro_laboral', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('miembros_id');
            $table->foreign('miembros_id')->references('id')->on('miembros')->onDelete('cascade');
           
            $table->string('lugar');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->timestamps();
        });

        Schema::create('miembro_eclesial', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('miembros_id');
            $table->foreign('miembros_id')->references('id')->on('miembros')->onDelete('cascade');;
            
            $table->date('fechaingreso');                           //Fecha de Ingreso en la iglesia actual
            $table->date('fechaconversion')->nullable();            //fecha de conversión que puede ser anterior a la fecha de ingreso
            $table->string('iglesiaconversion')->nullable();            //Iglesia en la que dió el paso de fé
            $table->boolean('bautizado');                               //Si bautizado es true, habilitar fecha de bautismo, si el false deshabilitar
            $table->string('iglesiabautismo')->nullable();
            $table->date('fechabautismo')->nullable();           
            $table->string('iglesiaanterior')->nullable();               //si viene de otra iglesia
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

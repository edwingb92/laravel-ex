<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearLlavesForaneasMiembros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miembros', function (Blueprint $table) {
       
        $table->unsignedInteger('profesion_id')->nullable()->after('genero');
        $table->foreign('profesion_id')->references('id')->on('profesion')->onDelete('set null');
       
        $table->unsignedInteger('tipopersona_id')->nullable()->after('profesion_id');
        $table->foreign('tipopersona_id')->references('id')->on('tipopersona')->onDelete('set null');

        $table->unsignedInteger('clasificacionsocial_id')->nullable()->after('tipopersona_id');;
        $table->foreign('clasificacionsocial_id')->references('id')->on('clasificacionsocial')->onDelete('set null');

        $table->unsignedInteger('estadocivil_id')->nullable()->after('clasificacionsocial_id');;
        $table->foreign('estadocivil_id')->references('id')->on('estadocivil')->onDelete('set null');

        $table->unsignedInteger('tipodocumento_id')->nullable()->after('apellido2');;
        $table->foreign('tipodocumento_id')->references('id')->on('tipodocumento')->onDelete('set null');    

        $table->unsignedInteger('estadomembresia_id')->nullable()->after('estadocivil_id');;
        $table->foreign('estadomembresia_id')->references('id')->on('estadomembresia')->onDelete('set null'); 

        $table->unsignedInteger('avatars_id')->nullable()->after('fotoperfil');
        $table->foreign('avatars_id')->references('id')->on('avatars')->onDelete('set null'); 
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

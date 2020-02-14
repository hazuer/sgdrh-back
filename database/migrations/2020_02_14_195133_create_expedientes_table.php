<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->bigIncrements('id_expediente');
            $table->string('numero_empleado', 20);
            $table->string('nombres', 70);
            $table->string('ap_paterno', 70);
            $table->string('ap_materno', 70);
            $table->integer('id_cat_genero');
            $table->string('fecha_nacimiento', 10);
            $table->string('email', 70);
            $table->string('curp', 18);
            $table->string('rfc', 18);
            $table->string('puesto', 150);
            $table->integer('id_estatus');
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
        Schema::dropIfExists('expedientes');
    }
}

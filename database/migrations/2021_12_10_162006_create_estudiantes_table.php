<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
                        $table->bigIncrements('id');
                       $table->string('nombre');
                       $table->string('matricula');
                       $table->string('apellido_paterno');
                       $table->string('apellido_materno');
                       $table->integer('salon_id')->unsigned();
                       $table->foreign('salon_id')->references('id')->on('salones');
                       $table->integer('materias_id')->unsigned();
                       $table->foreign('materias_id')->references('id')->on('materias');
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
        Schema::dropIfExists('estudiantes');
    }
}

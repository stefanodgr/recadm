<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_temps', function (Blueprint $table) {
            $table->bigIncrements('id',11);
            $table->string('nacionalidad',1);
            $table->string('cedula',20)->unique();
            $table->string('nombre_pr',60);
            $table->string('nombre_seg',60)->nullable();
            $table->string('apellido_pr',60);
            $table->string('apellido_seg',60)->nullable();
            $table->date('fecha_nac');
            $table->string('genero',30);
            $table->string('email',120)->unique();
            $table->string('telf_local',20)->nullable();
            $table->string('telf_celular',20)->unique();
            $table->unsignedBigInteger('profession_id');
            $table->unsignedBigInteger('academiclevel_id');
            $table->string('direccion',150);
            $table->string('avenida',150);
            $table->string('calle',150);
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('municipio_id');
            $table->unsignedBigInteger('parroquia_id');
            $table->unsignedBigInteger('estatus');
            $table->timestamps();

            $table->foreign('profession_id')->references('id')->on('professions')->onDelete('cascade');
            $table->foreign('academiclevel_id')->references('id')->on('academiclevels')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
            $table->foreign('parroquia_id')->references('id')->on('parroquias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_temps');
    }
}

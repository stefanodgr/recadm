<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cnes', function (Blueprint $table) {
            $table->bigIncrements('id',11);
            $table->string('nacionalidad',1);
            $table->string('cedula',8);
            $table->string('apellido_pr',150);
            $table->string('apellido_seg',150);
            $table->string('nombre_pr',150);
            $table->string('nombre_seg',150);
            $table->string('sexo',1);
            $table->string('fecha',100);
            $table->unsignedBigInteger('estado_id');
            $table->string('cod_estado',150);
            $table->unsignedBigInteger('municipio_id');
            $table->string('cod_municipio',150);
            $table->unsignedBigInteger('parroquia_id');
            $table->string('cod_parroquia',150);
            $table->string('center_cne_id',150);
            $table->timestamps();

            $table->unique('nacionalidad')->unique('cedula')->unique('estado_id')->unique('municipio_id')->unique('parroquia_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cnes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentervotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centervotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_viejo',30);
            $table->string('codigo',30);
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('municipio_id');
            $table->unsignedBigInteger('parroquia_id');
            $table->string('condicion',30);
            $table->string('descripcion',160);
            $table->string('direccion',160);
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('status_id');
            $table->string('circuito_municipio',100)->nullable();
            $table->string('num_mesas',30)->nullable();
            $table->string('centro_acopio',1)->nullable();
            $table->string('remoto',1)->nullable();;
            $table->string('tecnologia',100)->nullable();
            $table->string('estrato',100)->nullable();
            $table->string('muestra',100)->nullable();

            $table->timestamps();

            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centervotes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentercnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centercnes', function (Blueprint $table) {
            $table->bigIncrements('id',11);
            $table->string('codigo_viejo',30);
            $table->string('codigo',30);
            $table->string('condicion',30);
            $table->string('estado_id',30);
            $table->string('municipio_id',30);
            $table->string('parroquia_id',30);

            $table->string('descripcion',160);
            $table->string('direccion',160);
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
        Schema::dropIfExists('centercnes');
    }
}

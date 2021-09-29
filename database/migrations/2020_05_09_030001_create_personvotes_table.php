<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonvotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personvotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('centervote_id');
            $table->string('observaciones',150)->nullable();
            $table->unsignedBigInteger('electorallist_id');
            $table->unsignedBigInteger('periodo_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->unique('person_id')->unique('electorallist_id')->unique('periodo_id');
            $table->foreign('electorallist_id')->references('id')->on('electorallists')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('centervote_id')->references('id')->on('centervotes')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->foreign('periodo_id')->references('id')->on('electoralcommissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personvotes');
    }
}

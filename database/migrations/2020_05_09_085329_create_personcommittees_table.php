<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersoncommitteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personcommittees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('localcommitte_id');
            $table->unsignedBigInteger('position_id');
            $table->string('observaciones',150)->nullable();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('status_id');

            $table->timestamps();

            $table->unique('localcommitte_id')->unique('position_id')->unique('person_id');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('localcommitte_id')->references('id')->on('localcommittees')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personcommittees');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlecturerUsubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulecturer_usubjects', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('lecturer_id')->unsigned();
            $table->foreign('lecturer_id')->references('id')->on('ulecturers')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('usubjects')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('ulecturer_usubjects');
    }
}

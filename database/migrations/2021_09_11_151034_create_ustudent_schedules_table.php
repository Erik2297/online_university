<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUstudentSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ustudent_schedules', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('ugroups')->onDelete('cascade')->onUpdate('cascade');

            $table->string('day');
            $table->string('time');

            $table->bigInteger('lecturer_id')->unsigned();
            $table->foreign('lecturer_id')->references('id')->on('ulecturers')->onDelete('cascade')->onUpdate('cascade');

            $table->string('room');

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
        Schema::dropIfExists('ustudent_schedules');
    }
}

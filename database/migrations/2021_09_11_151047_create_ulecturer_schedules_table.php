<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlecturerSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulecturer_schedules', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('ugroups')->onDelete('cascade')->onUpdate('cascade');

            $table->string('day');
            $table->string('time');

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
        Schema::dropIfExists('ulecturer_schedules');
    }
}

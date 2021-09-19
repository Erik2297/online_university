<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUgroupUsubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ugroup_usubjects', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('ugroups')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('ugroup_usubjects');
    }
}

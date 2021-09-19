<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ustudents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar');
            $table->timestamp('email_verified_at')->nullable();

            $table->bigInteger('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('ugroups')->onDelete('cascade')->onUpdate('cascade');

            $table->string('role_in_group');
            $table->string('active_status');
            $table->string('paused')->default('false');
            $table->dateTime('born');
            $table->year('entered_the_university');
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
        Schema::dropIfExists('ustudents');
    }
}

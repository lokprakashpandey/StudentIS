<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->enum('gender',['M','F']);

            $table->integer('fk_userid')->unsigned();
            $table->foreign('fk_userid')->references('id')->on('users');

            $table->integer('fk_programid')->unsigned();
            $table->foreign('fk_programid')->references('id')->on('programs');

            $table->integer('fk_semesterid')->unsigned();
            $table->foreign('fk_semesterid')->references('id')->on('semesters');

            $table->integer('fk_sectionid')->unsigned();
            $table->foreign('fk_sectionid')->references('id')->on('sections');

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
        Schema::dropIfExists('profiles');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SchoolbeanM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('schoolbean' ,function(Blueprint $table){
            $table -> increments('id');
            $table -> string('schoolname');
            $table -> string('cityname');
            $table -> integer('num');    //打印店数目
            $table -> integer('adnum');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('schoolbean');
    }
}

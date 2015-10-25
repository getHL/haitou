<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Console\Scheduling\Schedule;

class DataMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printshopbean', function(Blueprint $table){
    		$table-> increments('id');
            $table -> string('telenum');
            $table -> integer('money');
            $table -> string('shopaddress');
            $table -> string('shoplatlong');
            $table -> string('cityname');
            $table -> string('shopname');
            $table -> string('bossname');
            $table -> dateTime('paydeadline');
            $table -> integer('adnum');
            $table -> string('schoolname');
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
        Schema::drop('printshopbean');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PayHistoryM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('payhistorybean' ,function(Blueprint $table){
            $table -> increments('id');
            $table -> integer('pay_money');
            $table -> datetime('pay_date');
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
        Schema::drop('payhistorybean');
    }
}

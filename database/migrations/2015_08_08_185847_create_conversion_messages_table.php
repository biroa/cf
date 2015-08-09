<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConversionMessagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversion_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned();
            $table->char('currencyFrom',3);
            $table->char('currencyTo',3);
            $table->decimal('amountSell',10,4)->nullable()->defeult('NULL');
            $table->decimal('amountBuy',10,4)->nullable()->defeult('NULL');
            $table->decimal('rate',10,6);
            $table->dateTime('timePlaced');
            $table->char('originatingCountry',2);
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
        Schema::drop('conversion_messages');
    }

}

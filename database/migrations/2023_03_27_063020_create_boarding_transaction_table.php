<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardingTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_transaction', function(Blueprint $table){
        $table->increments('id');
        $table->integer('transaction_id')->unsigned();
        $table->string('pet_name');
        $table->string('service_name');
        $table->integer('price');
        $table->integer('total');

        $table->timestamps();
            // $table->foreign('transaction_id')->references('id')->on('products_order_transactions')->onDelete('cascade');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('boarding_transaction');    }
}
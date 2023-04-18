<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroomingTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grooming_transaction', function(Blueprint $table){
        $table->increments('id');
        $table->integer('transaction_id')->unsigned();
        $table->string('variation_id');
        $table->string('pet_name');
        $table->integer('price');

        $table->timestamps();
        // $table->foreign('transaction_id')->references('id')->on('services_order_transactions')->onDelete('cascade');

    });
 }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('grooming_transaction');
    }
}

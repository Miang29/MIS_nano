<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultationTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultation_transaction', function(Blueprint $table){
            $table->increments('id');
            $table->integer('transaction_id')->unsigned();
            $table->string('service_name');
            $table->integer('price');
            $table->integer('additional_cost')->unsigned();
            $table->string('pet_name');
            $table->string('weight');
            $table->string('temperature');
            $table->string('findings')->nullable();
             $table->string('treatment')->nullable();
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
          Schema::dropIfExists('consultation_transaction');
    }
}
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_id');
            $table->string('issued_on');
            $table->string('invoice_for');
            $table->string('invoice_messer');
            $table->integer('applied_admission');
            $table->string('total');
            $table->string('total_in_words');
            $table->string('payment_mode');
            $table->string('transaction_id');
            $table->string('branch_name');
            $table->string('cf1name')->nullable();
            $table->string('cf1value')->nullable();
            $table->string('cf1name2')->nullable();
            $table->string('cf1value2')->nullable();
            $table->string('cf1name3')->nullable();
            $table->string('cf1value3')->nullable();
            $table->string('cf1name4')->nullable();
            $table->string('cf1value4')->nullable();
            $table->string('cf1name5')->nullable();
            $table->string('cf1value5')->nullable();
            $table->integer('invoice_status');
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
        Schema::dropIfExists('invoices');
    }
}

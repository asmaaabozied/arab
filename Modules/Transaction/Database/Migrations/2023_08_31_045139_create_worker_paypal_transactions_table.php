<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_paypal_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worker_id')->constrained('workers');
            $table->string('payout_batch_id');
            $table->string('sender_batch_id');
            $table->double('amount_requested');
            $table->double('amount_payed');
            $table->double('paypal_fees');
            $table->string('currency');
            $table->string('receiver_email');
            $table->string('note');
            $table->string('href');
            $table->softDeletes();
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
        Schema::dropIfExists('worker_paypal_transactions');
    }
};

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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('home_site_logo');
            $table->string('dashboard_site_logo');
            $table->double('min_withdraw_limit');
            $table->double('fees_per_transfer_wallet_balance');
            $table->double('fees_per_withdraw_wallet_using_paypal');
            $table->double('fees_per_charge_wallet_using_paypal');
            $table->integer('days_added_to_task_end_date_when_reject_task_proof');
            $table->integer('pin_in_top_task_limit_count');
            $table->string('exchange_rate_api_key');
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
        Schema::dropIfExists('settings');
    }
};

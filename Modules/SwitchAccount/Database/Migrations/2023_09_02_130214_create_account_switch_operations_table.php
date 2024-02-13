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
        Schema::create('account_switch_operations', function (Blueprint $table) {
            $table->id();
            $table->enum('from', ['employer', 'worker']);
            $table->enum('to', ['employer', 'worker']);
            $table->foreignId('employer_id')->constrained('employers');
            $table->foreignId('worker_id')->constrained('workers');
            $table->enum('isTransferWalletBalance',['true','false'])->default('false');
            $table->double('transferred_amount')->default(0);
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
        Schema::dropIfExists('account_switch_operations');
    }
};

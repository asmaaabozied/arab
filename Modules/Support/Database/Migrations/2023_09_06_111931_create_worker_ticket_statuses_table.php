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
        Schema::create('worker_ticket_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worker_ticket_id')->constrained('worker_tickets');
            $table->foreignId('ticket_status_id')->constrained('ticket_statuses');
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
        Schema::dropIfExists('worker_ticket_statuses');
    }
};

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
        Schema::create('employer_ticket_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_ticket_id')->constrained('employer_tickets');
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
        Schema::dropIfExists('employer_ticket_statuses');
    }
};

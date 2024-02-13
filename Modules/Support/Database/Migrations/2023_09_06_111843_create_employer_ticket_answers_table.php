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
        Schema::create('employer_ticket_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_ticket_id')->constrained('employer_tickets');
            $table->foreignId('admin_id')->constrained('admins');
            $table->text('admin_answer');
            $table->string('admin_attached_file')->nullable();
            $table->timestamp('admin_answered_at')->nullable();
            $table->text('employer_answer')->nullable();
            $table->string('employer_attached_file')->nullable();
            $table->timestamp('employer_answered_at')->nullable();
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
        Schema::dropIfExists('employer_ticket_answers');
    }
};

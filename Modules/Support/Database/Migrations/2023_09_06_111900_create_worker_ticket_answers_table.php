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
        Schema::create('worker_ticket_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worker_ticket_id')->constrained('worker_tickets');
            $table->foreignId('admin_id')->constrained('admins');
            $table->text('admin_answer');
            $table->string('admin_attached_file')->nullable();
            $table->timestamp('admin_answered_at')->nullable();
            $table->text('worker_answer')->nullable();
            $table->string('worker_attached_file')->nullable();
            $table->timestamp('worker_answered_at')->nullable();
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
        Schema::dropIfExists('worker_ticket_answers');
    }
};

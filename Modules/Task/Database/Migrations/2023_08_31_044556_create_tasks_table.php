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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task_number')->unique();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('title');
            $table->string('description');
            $table->foreignId('employer_id')->constrained('employers');
            $table->string('proof_request_ques')->nullable()->default(null);
            $table->string('proof_request_screenShot')->nullable()->default(null);
            $table->integer('total_worker_limit');
            $table->integer('approved_workers')->default(0);
            $table->double('cost_per_worker');
            $table->date('task_end_date');
            $table->enum('special_access',['true','false'])->default('false');
            $table->enum('only_professional',['true','false'])->default('false');
            $table->integer('daily_limit')->nullable()->default(null);
            $table->double('task_cost');
            $table->double('other_cost');
            $table->double('total_cost');
            $table->enum('publish_status',['NotPublished','Published']);
            $table->enum('is_hidden',['true','false'])->default('false');
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
        Schema::dropIfExists('tasks');
    }
};

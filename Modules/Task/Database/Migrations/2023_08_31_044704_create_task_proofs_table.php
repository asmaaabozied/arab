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
        Schema::create('task_proofs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('tasks');
            $table->foreignId('worker_id')->constrained('workers');
            $table->foreignId('employer_id')->constrained('employers');
            $table->string('screenshot')->nullable();
            $table->string('answer_text')->nullable();
            $table->string('description')->nullable();
            $table->enum('isEmployerAcceptProof', ['NotSeenYet','No','Yes'])->default('NotSeenYet');
            $table->enum('isAdminAcceptProof', ['NotSeenYet','No','Yes'])->default('NotSeenYet');
            $table->string('reasonOfEmployerRefuse')->nullable()->default(null);
            $table->string('reasonOfAdminRefuse')->nullable()->default(null);
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
        Schema::dropIfExists('task_proofs');
    }
};

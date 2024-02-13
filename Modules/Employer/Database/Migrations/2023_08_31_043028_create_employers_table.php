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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('employer_number')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->string('google_id')->nullable();//getting from google auth
            $table->string('facebook_id')->nullable();//getting from google auth
            $table->string('password');
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->string('phone')->nullable()->unique();
            $table->foreignId('employer_level_id')->default(1)->constrained('employer_levels');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->enum('status', ['enable', 'disable',])->default('enable');
            $table->integer('suspend_days')->default(0);
            $table->date('suspend_start_date')->nullable();
            $table->double('wallet_balance')->default(0);
            $table->double('total_spends')->default(0);
            $table->string('current_currency')->default('USD');
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('employers');
    }
};

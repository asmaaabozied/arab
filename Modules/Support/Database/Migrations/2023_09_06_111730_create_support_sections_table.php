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
        Schema::create('support_sections', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('ar_name');
            $table->string('en_name');
            $table->text('en_description');
            $table->text('ar_description');
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
        Schema::dropIfExists('support_sections');
    }
};

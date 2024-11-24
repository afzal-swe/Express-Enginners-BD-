<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_list', function (Blueprint $table) {
            $table->id();
            $table->integer('project_sl');
            $table->string('project_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('name')->nullable();
            $table->string('lift_quanitiy')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('generator_status')->default(0);
            $table->string('generator_quanitiy')->nullable();
            $table->string('generator_unit_price')->nullable();
            $table->string('generator_total_price')->nullable();
            $table->string('in_word')->nullable();
            $table->string('monthly_bill')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('project_list');
    }
};

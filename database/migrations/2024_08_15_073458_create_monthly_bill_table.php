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
        Schema::create('monthly_bill', function (Blueprint $table) {
            $table->id();
            // $table->string('project_id')->nullable();
            $table->foreignId('project_id')->constrained('project_list')->cascadeOnDelete();
            $table->string('billing_id')->nullable();
            $table->string('date')->nullable();
            $table->string('description')->nullable();
            $table->string('month_name')->nullable();
            $table->string('no_month')->nullable();
            $table->string('lift_quanitiy')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('total_price')->nullable();
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
        Schema::dropIfExists('monthly_bill');
    }
};

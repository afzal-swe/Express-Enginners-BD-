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
        Schema::create('employee_bill', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('e_id')->nullable();
            $table->string('reason')->nullable();
            $table->string('sallary_month')->nullable();
            $table->string('convenance_month')->nullable();
            $table->string('over_time_month')->nullable();
            $table->string('puscles_project')->nullable();
            $table->string('eid_bonus')->nullable();
            $table->string('loan_purpose')->nullable();
            $table->string('discription')->nullable();
            $table->string('deposit')->nullable();
            $table->string('costs')->nullable();
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
        Schema::dropIfExists('employee_bill');
    }
};

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
        Schema::create('daly_income_statement', function (Blueprint $table) {
            $table->id();
            $table->string('income_date')->nullable();
            $table->text('income_particulars')->nullable();
            $table->string('income_reason')->nullable();
            $table->string('income_amount')->nullable();
            $table->string('income_total')->nullable();
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
        Schema::dropIfExists('daly_income_statement');
    }
};

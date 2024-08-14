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
        Schema::create('daly_expense_statement', function (Blueprint $table) {
            $table->id();
            $table->string('expense_date')->nullable();
            $table->text('expense_particulars')->nullable();
            $table->string('expense_reason')->nullable();
            $table->string('expense_amount')->nullable();
            $table->string('expense_total')->nullable();
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
        Schema::dropIfExists('daly_expense_statement');
    }
};

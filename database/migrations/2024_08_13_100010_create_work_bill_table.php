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
        Schema::create('work_bill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('project_list')->cascadeOnDelete();
            $table->string('ref')->nullable();
            $table->date('billing_date')->nullable();
            $table->string('equipment_list')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('sub_price')->nullable();
            $table->string('total_price')->nullable();
            $table->string('in_word')->nullable();
            $table->string('payable')->nullable();
            $table->string('general_terms')->nullable();
            $table->date('supply_date')->nullable();
            $table->date('expire_date')->nullable();
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
        Schema::dropIfExists('work_bill');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('court_case_id');
            $table->string('name')->nullable();
            $table->double('amount')->default(0)->nullable();
            $table->string('type')->nullable()->comment('commission , expenses and case payment');

            $table->string('payment_method')->nullable()->comment(' cash , check');
            $table->date('payment_date')->nullable();
            $table->double('percentage')->default(0)->nullable()->comment(' for  type commission');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('case_payments');
    }
}

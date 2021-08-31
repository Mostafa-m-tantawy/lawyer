<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGeneralPaymentTablePaymentDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_expenses', function (Blueprint $table) {

            $table->date('payment_date')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('type')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_expenses', function (Blueprint $table) {

            $table->drop('payment_date');
            $table->drop('type');
            $table->drop('payment_method');

        });
    }
}

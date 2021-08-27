<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCourtCasesCalculatedColomns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('court_cases', function (Blueprint $table) {
            $table->double('total_paid')->default(0)->nullable();
            $table->double('total_expenses')->default(0)->nullable();
            $table->double('total_pending')->default(0)->nullable();
            $table->double('total_commission')->default(0)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('court_cases', function (Blueprint $table) {
            //
        });
    }
}

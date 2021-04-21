<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalaryTotalDeductionToSalarysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salarys', function (Blueprint $table) {
            $table->integer('salary_total_deduction')->after('salary_absent_deduction_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salarys', function (Blueprint $table) {
            $table->dropColumn('salary_total_deduction');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalarysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salarys', function (Blueprint $table) {
            $table->id('salary_id');
            $table->string('salary_paymatrix_id');
            $table->string('salary_employeelist_id');
            $table->string('salary_user_email');
            $table->integer('salary_salary_base_salary');
            $table->integer('salary_dearness_allowance');
            $table->integer('salary_house_rent_allowance');
            $table->integer('salary_transport_allowance');
            $table->integer('salary_medical_allowance');
            $table->integer('salary_provident_fund');
            $table->integer('salary_income_tax');
            $table->integer('salary_insurance');
            $table->integer('salary_gross_salary');
            $table->integer('salary_net_salary');
            $table->string('month');
            $table->integer('total_month_day');
            $table->integer('absent_day');
            $table->integer('salary_absent_deduction_amount');
            $table->integer('year');
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
        Schema::dropIfExists('salarys');
    }
}

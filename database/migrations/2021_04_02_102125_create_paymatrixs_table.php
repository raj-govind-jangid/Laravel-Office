<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymatrixsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymatrixs', function (Blueprint $table) {
            $table->id('paymatrix_id');
            $table->string('paymatrix_level_name');
            $table->integer('paymatrix_base_salary');
            $table->integer('paymatrix_dearness_allowance');
            $table->integer('paymatrix_house_rent_allowance');
            $table->integer('paymatrix_transport_allowance');
            $table->integer('paymatrix_medical_allowance');
            $table->integer('paymatrix_provident_fund');
            $table->integer('paymatrix_income_tax');
            $table->integer('paymatrix_insurance');
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
        Schema::dropIfExists('paymatrixs');
    }
}

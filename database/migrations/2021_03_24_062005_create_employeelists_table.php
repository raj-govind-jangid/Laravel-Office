<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeelists', function (Blueprint $table) {
            $table->id('employeelist_id');
            $table->string('employee_first_name');
            $table->string('employee_last_name');
            $table->string('employee_email');
            $table->string('employee_gender');
            $table->string('employee_phoneno');
            $table->string('employee_department_id');
            $table->text('employee_home_address');
            $table->string('employee_post_id');
            $table->string('employee_paymatrix_id');
            $table->date('employee_joining_date');
            $table->string('employee_status');
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
        Schema::dropIfExists('employeelists');
    }
}

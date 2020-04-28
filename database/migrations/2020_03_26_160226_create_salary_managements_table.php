<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('emp_id')->unsigned();
            $table->double('basic_salary',15,2)->nullable();
            $table->double('variable_allowance',15,2)->nullable();
            $table->double('incentice',15,2)->nullable();
            $table->double('holiday_allowance',15,2)->nullable();
            $table->double('commission',15,2)->nullable();
            $table->double('phone_allowance',15,2)->nullable();
            $table->double('gross_salary',15,2)->nullable();
            $table->double('epf_employee_cont',15,2)->nullable();
            $table->double('salary_advance',15,2)->nullable();
            $table->double('telephone_deduction',15,2)->nullable();
            $table->double('no_pay',15,2)->nullable();
            $table->double('staff_loan',15,2)->nullable();
            $table->double('paye_tax',15,2)->nullable();
            $table->double('total_deductions',15,2)->nullable();
            $table->double('net_salary',15,2)->nullable();
            $table->double('epf_company_cont',15,2)->nullable();
            $table->double('etf_company_cont',15,2)->nullable();
            $table->double('remitted_amount',15,2)->nullable();
            $table->timestamps();
            $table->foreign('emp_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_managements');
    }
}

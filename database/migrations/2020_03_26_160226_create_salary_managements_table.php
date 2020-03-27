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
            $table->year('year_');
            $table->enum('for_month', ['January','February','March','April','May','June','July','August','September','November','December'])->default('January');
            $table->double('basic_salary',15,2);
            $table->double('variable_allowance',15,2);
            $table->double('incentice',15,2);
            $table->double('holiday_allowance',15,2);
            $table->double('commission',15,2);
            $table->double('phone_allowance',15,2);
            $table->double('gross_salary',15,2);
            $table->double('epf_employee_cont',15,2);
            $table->double('salary_advance',15,2);
            $table->double('telephone_deduction',15,2);
            $table->double('no_pay',15,2);
            $table->double('staff_loan',15,2);
            $table->double('paye_tax',15,2);
            $table->double('total_deductions',15,2);
            $table->double('net_salary',15,2);
            $table->double('epf_company_cont',15,2);
            $table->double('etf_company_cont',15,2);
            $table->double('remitted_amount',15,2);
            $table->dateTime('date_');
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

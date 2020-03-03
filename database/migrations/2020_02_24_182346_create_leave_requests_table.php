<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('emp_id')->unsigned();
            $table->integer('document_id');
            $table->string('reason');
            $table->dateTime('from_date_time');
            $table->dateTime('to_date_time');
            $table->bigInteger('request_by')->unsigned();//emp_id
            $table->bigInteger('approved_by')->unsigned();//emp_id
            $table->enum('status', ['approved','rejected','pending'])->default('pending');
            $table->enum('duration_type', ['full_day','half_day','short_leave'])->default('full_day');
            $table->enum('type', ['no_pay','casual'])->default('casual');
            $table->timestamps();
            $table->foreign('emp_id')->references('id')->on('users');
            $table->foreign('request_by')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_requests');
    }
}

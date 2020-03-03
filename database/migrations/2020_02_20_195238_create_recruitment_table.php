<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cv_id');
            $table->string('name',100);
            $table->string('NIC',12)->unique();
            $table->string('email',100)->unique();
            $table->string('applied_job_position',250);
            $table->datetime('first_interview_date')->nullable();
            $table->datetime('second_interview_date')->nullable();
            $table->bigInteger('interviewer')->unsigned();
            $table->string('notes',250);
            $table->enum('cv_processing_result', ['not_selected','selected'])->default('selected')->nullable();
            $table->enum('first_interview_result', ['pass', 'fail','pending'])->default('pending')->nullable();
            $table->enum('current_state', ['cv_selected', 'first_interview_pass'])->default('cv_selected');
            $table->timestamps();
            $table->foreign('interviewer')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment');
    }
}

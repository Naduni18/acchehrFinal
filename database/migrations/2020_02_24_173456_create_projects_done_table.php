<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsDoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_done', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('emp_id')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->string('role_played')->nullable();
            $table->string('organization')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('awards_marks')->nullable();
            $table->enum('type', ['internal', 'external'])->default('internal');
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
        Schema::dropIfExists('projects_done');
    }
}

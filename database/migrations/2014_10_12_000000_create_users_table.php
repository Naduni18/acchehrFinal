<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('avatar_id')->nullable();
            $table->string('name',100)->nullable();
            $table->string('NIC',12)->unique()->nullable();
            $table->string('email',100)->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('current_job_position',250)->nullable();
            $table->date('birthday')->nullable();
            $table->date('anniversary')->nullable();
            $table->integer('phone_home')->nullable();
            $table->integer('phone_mobile')->nullable();
            $table->string('address_permanent',250)->nullable();
            $table->string('address_temporary',250)->nullable();
            $table->string('branch')->nullable();
            $table->string('bank')->nullable();
            $table->string('bank_number')->nullable();
            $table->string('next_kin_name',100)->nullable();
            $table->string('next_kin_occupation',250)->nullable();
            $table->string('next_kin_office_address',250)->nullable();
            $table->integer('next_kin_phone_mobile')->nullable();
            $table->integer('next_kin_phone_home')->nullable();
            $table->string('next_kin_address',100)->nullable();
            $table->enum('user_role', ['manager', 'employee','admin'])->default('employee')->nullable();
            $table->bigInteger('supervisor_manager')->nullable()->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('supervisor_manager')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

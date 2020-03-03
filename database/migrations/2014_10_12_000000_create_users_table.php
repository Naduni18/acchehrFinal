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
            $table->string('name',100);
            $table->string('NIC',12)->unique();
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('current_job_position',250);
            $table->date('birthday')->nullable();
            $table->date('anniversary')->nullable();
            $table->integer('phone_home');
            $table->integer('phone_mobile')->nullable();
            $table->string('address_permanent',250);
            $table->string('address_temporary',250)->nullable();
            $table->string('branch');
            $table->string('bank')->nullable();
            $table->string('bank_no')->nullable();
            $table->string('next_kin_name',100)->nullable();
            $table->string('next_kin_occupation',250)->nullable();
            $table->string('next_kin_office_address',250)->nullable();
            $table->integer('next_kin_phone_mobile')->nullable();
            $table->integer('next_kin_phone_home')->nullable();
            $table->string('next_kin_address',100);
            $table->enum('role', ['manager', 'employee','admin'])->default('employee');
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

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'avatar_id'=>null,
            'name' => 'Admin',
            'email' => 'admin@argon.com',
            'password' => Hash::make('secret'),
            'NIC'=>'905183931V',
            'current_job_position'=>'QA',
            'birthday'=>'1990-01-18',
            'anniversary'=>'1991-01-19',
            'phone_home'=>'0754896289',
            'phone_mobile'=>'0754896289',
            'address_permanent'=>'abdc',
            'address_temporary'=>'abcd',
            'branch'=>'abcd',
            'bank'=>'abcd',
            'bank_number'=>'87954ASDFRG54FD54ED',
            'next_kin_name'=>'ann',
            'next_kin_occupation'=>'UI developer',
            'next_kin_office_address'=>'pqrs',
            'next_kin_phone_mobile'=>'0754896289',
            'next_kin_phone_home'=>'0754896289',
            'next_kin_address'=>'wsxc',
            'user_role'=>'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'avatar_id'=>null,
            'name' => 'Manager',
            'email' => 'manager@argon.com',
            'password' => Hash::make('secret'),
            'NIC'=>'905183932V',
            'current_job_position'=>'QA',
            'birthday'=>'1990-01-18',
            'anniversary'=>'1991-01-19',
            'phone_home'=>'0754896289',
            'phone_mobile'=>'0754896289',
            'address_permanent'=>'abdc',
            'address_temporary'=>'abcd',
            'branch'=>'abcd',
            'bank'=>'abcd',
            'bank_number'=>'87954ASDFRG54FD54ED',
            'next_kin_name'=>'ann',
            'next_kin_occupation'=>'UI developer',
            'next_kin_office_address'=>'pqrs',
            'next_kin_phone_mobile'=>'0754896289',
            'next_kin_phone_home'=>'0754896289',
            'next_kin_address'=>'wsxc',
            'user_role'=>'manager',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

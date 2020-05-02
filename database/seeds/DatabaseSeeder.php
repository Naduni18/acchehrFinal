<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([calender_eventsTableSeeder::class]);
        $this->call([expense_claimTableSeeder::class]);
        $this->call([recruitmentTableSeeder::class]);
    }
}

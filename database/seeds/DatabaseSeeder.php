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
        $this->call(UserTableSeeder::class);
        $this->call(InstitutionTableSeeder::class);
        $this->call(ExamResultTableSeeder::class);
        $this->call(AdsTableSeeder::class);
        $this->call(messageTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class ExamResultTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ExamResult',1)->create();
    }
}

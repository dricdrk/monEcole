<?php

use Illuminate\Database\Seeder;

class messageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Message',5)->create(); 
    }
}

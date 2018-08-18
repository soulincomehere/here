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
        //后台用户模拟数据
         $this->call(ManagerTableSeeder::class);
    }
}

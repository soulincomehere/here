<?php

use Illuminate\Database\Seeder;
use App\Models\Manager;
use faker;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //清空表
        Manager::truncate();
        //后台管理员账号
        Manager::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'nickname' => '帅哥',
            'sex' => '先生',
            'email' =>'1658996694@qq.com',
            'phone' => '13254521251',
            'avatar' => 'https://www.baidu.com/img/bd_logo1.png',
        ]);
//        config('admin.avatar,default_pic')
//        for ($i=1;$i<=10;$i++ ){
//            Manager::create([
//                'username' => str_random(10),
//                'password' => bcrypt('admin'),
//                'nickname' => ['帅哥','女士'][rand(0,1)],
//                'sex' => ['先生','女士'][rand(0,1)],
//                'email' =>str_random(10).'@126.com',
//                'phone' => '13254521251',
//                'avatar' =>'https://www.baidu.com/img/bd_logo1.png',
//            ]);
//        }
        //本地化操作
        $faker = Faker\Factory::create('zh_CN');
        for ($i=1;$i<=10;$i++ ){
            Manager::create([
                'username' => $faker->userName,
                'password' => bcrypt('admin'),
                'nickname' => $faker->name(),
                'sex' => ['先生','女士'][rand(0,1)],
                'email' =>$faker->email,
                'phone' => $faker->phoneNumber,
                'avatar' =>'https://www.baidu.com/img/bd_logo1.png',
            ]);
        }

    }
}

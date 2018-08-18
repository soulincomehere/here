<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',50)->default('')->comment('用户名');
            $table->string('password',255)->default('')->comment('密码');
            $table->string('nickname',50)->default('')->comment('昵称');
            $table->enum('sex',['先生','女士'])->default('女士')->comment('性别');
            $table->string('email',200)->default('')->comment('邮箱');
            $table->char('phone',15)->default('')->comment('手机号码');
            $table->string('avatar',200)->default('')->comment('头像');
            $table->enum('is_ok',['1','2'])->default('1')->comment('是否激活:1:是，2:否');
            $table->timestamps();
            //记住我
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('managers');
    }
}

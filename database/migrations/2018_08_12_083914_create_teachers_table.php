<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uname',50)->default('')->comment('老师姓名');
            $table->string('phone',20)->default('')->comment('老师手机号');
            $table->string('email',255)->default('')->comment('老师邮箱');
            $table->string('avatar',255)->default('')->comment('老师头像');
            $table->text('remark')->comment('老师简介');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}

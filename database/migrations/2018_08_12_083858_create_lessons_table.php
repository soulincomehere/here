<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pro_id')->default(0)->comment('专业ID');
            $table->unsignedInteger('course_id')->default(0)->comment('课程ID');
            $table->unsignedInteger('teacher_id')->default(0)->comment('老师ID');
            $table->string('lesson_name',50)->default('')->comment('课时名称');
            $table->string('cover_img',255)->default('')->comment('课时封面');
            $table->string('video_url',255)->default('')->comment('播放地址');
            $table->string('lesson_desc',255)->default('')->comment('课时简介');
            $table->unsignedInteger('lesson_duration')->default(0)->comment('视频分钟数');
            $table->enum('is_ok',['1','2'])->default('1')->comment('启用1，禁用2');
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
        Schema::dropIfExists('lessons');
    }
}

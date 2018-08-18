<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pro_id')->default(0)->comment('专业ID');
            $table->string('course_name',50)->default('')->comment('课程名称');
            $table->decimal('course_price',7,2)->default('0.00')->comment('课程价格');
            $table->text('course_desc')->comment('课程简介');
            $table->string('cover_img',255)->default('')->comment('课程封面');
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
        Schema::dropIfExists('courses');
    }
}

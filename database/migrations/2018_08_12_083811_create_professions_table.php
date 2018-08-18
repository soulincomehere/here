<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('teacher_id')->default(0)->comment('老师ID');
            $table->string('pro_name',64)->unique()->default('')->comment('专业名称');
            $table->string('pro_desc',255)->default('')->comment('专业简介');
            $table->string('cover_img',255)->default('')->comment('封面图');
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
        Schema::dropIfExists('professions');
    }
}

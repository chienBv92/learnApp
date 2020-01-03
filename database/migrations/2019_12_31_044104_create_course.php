<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_course', function (Blueprint $table) {
            //
            //$table->increments('id');
            $table->integer('level');
            $table->string('name', 250);
            $table->string('meta_title', 250);
            $table->string('layout_view')->nullable();
            $table->string('layout_regist')->nullable();
            $table->string('image', 250)->nullable();
            $table->string('description', 250)->nullable();
            $table->string('detail')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('del_flg')->default(false);
            $table->integer('top')->nullable();
            $table->integer('total_lesson')->default(0);
            $table->integer('created_by_user')->nullable();
            $table->integer('updated_by_user')->nullable();
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
        Schema::dropIfExists('tbl_course');

        Schema::table('tbl_course', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKanjiExample extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('kanji_example', function($table)
//        {
//            $table->increments('id');
//        });
        Schema::table('kanji_example', function (Blueprint $table) {
            //
            $table->char('kan_code', 5);
            $table->string('word', 100);
            $table->string('hiragara', 100);
            $table->string('HanViet', 100);
            $table->string('meaning', 100);
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
        Schema::table('kanji_example', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKanjiContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kanji_content', function($table)
        {
            $table->increments('id');
        });

        Schema::table('kanji_content', function (Blueprint $table) {
            //
            $table->char('kan_code', 5);
            $table->string('Bo', 50);
            $table->string('Name', 50);
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
        Schema::table('kanji_content', function (Blueprint $table) {
            //
        });
    }
}

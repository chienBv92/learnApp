<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKanji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kanji', function($table)
        {
            $table->char('code', 5);
        });

        Schema::table('tbl_kanji', function (Blueprint $table) {
            //

            $table->integer('level');
            $table->string('kanji', 50);
            $table->string('HanViet', 50);
            $table->string('meaning', 100);
            $table->string('On')->nullable();
            $table->string('Kun')->nullable();
            $table->string('Mind', 250)->nullable();
            $table->string('draw')->nullable();
            $table->integer('lookLearnNum')->nullable(0);
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
        Schema::table('tbl_kanji', function (Blueprint $table) {
            //
        });
    }
}

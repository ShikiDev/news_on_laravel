<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('title_eng');
            $table->integer('author_id')->default(0);
            $table->text('short_text');
            $table->longText('text');
            $table->dateTime('created_time');
            $table->dateTime('posted_time');
            $table->integer('posted',false,true)->deleted(0);
            $table->integer('deleted',false,true)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_comments', function ($table) {
            $table->increments('id');
            $table->integer('card_id');
            $table->integer('user_id');
            $table->string('comment');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('deck_comments', function ($table) {
            $table->increments('id');
            $table->integer('deck_id');
            $table->integer('user_id');
            $table->string('comment');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_comments');
        Schema::dropIfExists('deck_comments');
    }
}

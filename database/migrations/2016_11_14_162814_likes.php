<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Likes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deck_likes', function ($table) {
            $table->integer('deck_id');
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::create('card_likes', function ($table) {
            $table->integer('card_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('deck_likes');
        Schema::dropIfExists('card_likes');
    }
}

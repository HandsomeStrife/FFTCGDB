<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->boolean('public')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('deckcards', function (Blueprint $table) {
            $table->integer('deck_id');
            $table->integer('card_id');
            $table->integer('count');
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
        Schema::dropIfExists('decks');
        Schema::dropIfExists('deckcards');
    }
}

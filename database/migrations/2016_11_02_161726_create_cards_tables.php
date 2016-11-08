<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('cost')->nullable();
            $table->string('element')->nullable();
            $table->string('type')->nullable();
            $table->string('job')->nullable();
            $table->string('category')->nullable();
            $table->text('text')->nullable();
            $table->string('card_number');
            $table->string('rarity')->nullable();
            $table->integer('power')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('card_id');
            $table->integer('count');
            $table->timestamps();
        });

        // Insert the cards
        for ($i = 1; $i < 217; $i++) {
            DB::table('cards')->insert(
                ['card_number' => $i]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
        Schema::dropIfExists('collection');
    }
}

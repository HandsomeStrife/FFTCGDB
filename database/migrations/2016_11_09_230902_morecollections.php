<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Morecollections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collections', function ($table) {
            $table->integer('foil_count')->default(0)->after('foil');
            $table->integer('trade_count')->default(0)->after('foil_count');
            $table->integer('foil_trade_count')->default(0)->after('trade_count');
            $table->integer('wanted')->default(0)->after('trade_count');
            $table->integer('foil_wanted')->default(0)->after('wanted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collections', function ($table) {
            $table->dropColumn('foil_count');
            $table->dropColumn('trade_count');
            $table->dropColumn('foil_trade_count');
            $table->dropColumn('wanted');
            $table->dropColumn('foil_wanted');
        });
    }
}

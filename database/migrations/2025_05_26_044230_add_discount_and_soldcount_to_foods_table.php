<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDiscountAndSoldCountToFoodsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('food', function (Blueprint $table) {
            $table->boolean('is_discount')->default(false);
            $table->integer('sold_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('food', function (Blueprint $table) {
            $table->dropColumn(['is_discount', 'sold_count']);
        });
    }
}

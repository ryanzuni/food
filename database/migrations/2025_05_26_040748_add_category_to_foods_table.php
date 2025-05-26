<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToFoodsTable extends Migration
{
    public function up()
    {
        Schema::table('food', function (Blueprint $table) {
            $table->string('category')->nullable()->after('name');
        });
    }

    public function down()
    {
        Schema::table('food', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
}

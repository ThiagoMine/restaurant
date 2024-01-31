<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products_lists', function (Blueprint $table) {
            $table->string('name')->nullable();
        });
    }

    public function down()
    {
        Schema::table('products_lists', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
};

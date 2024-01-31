<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $configurations = array(
            [
                'name' => "Taxa de Entrega",
                'value' => "3",
                'active' => true
            ]
        );

        DB::table('configs')->insert($configurations);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('configs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
};

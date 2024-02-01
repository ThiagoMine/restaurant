<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $categories = array(
            [
                'name' => 'Açai',
                'seo_name' => 'acai',
                'is_active' => true,
                'father_category_id' => null
            ],
            [
                'name' => 'Porções',
                'seo_name' => 'porcoes',
                'is_active' => true,
                'father_category_id' => null
            ],
            [
                'name' => 'Pizzas Doces',
                'seo_name' => 'pizzas_doces',
                'is_active' => true,
                'father_category_id' => null
            ],
            [
                'name' => 'Pizzas',
                'seo_name' => 'pizzas',
                'is_active' => true,
                'father_category_id' => null
            ],
            [
                'name' => 'Combos',
                'seo_name' => 'combos',
                'is_active' => true,
                'father_category_id' => null
            ],
            [
                'name' => 'Lanches',
                'seo_name' => 'lanches',
                'is_active' => true,
                'father_category_id' => null
            ],
            [
                'name' => 'Pastéis',
                'seo_name' => 'pasteis',
                'is_active' => true,
                'father_category_id' => null
            ],
            [
                'name' => 'Produtos não cadastrados',
                'seo_name' => 'produtos_nao_cadastrados',
                'is_active' => true,
                'father_category_id' => null
            ]           
        );

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
};

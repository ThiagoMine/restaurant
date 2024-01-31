<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const CATEGORY_PIZZA = 4;
    const CATEGORY_ACAI = 1;
    const CATEGORY_PORCOES = 2;
    const CATEGORY_PIZZA_DOCE = 3;
    const CATEGORY_COMBOS = 5;
    const CATEGORY_LANCHES = 6;
    const CATEGORY_PATEIS = 7;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $products = array(
            [
                'name' => 'Misto Quente',
                'seo_name' => 'misto_quente',
                'description' => 'Batata Palha, 2 Presuntos, 2 Mussarelas',
                'type' => 1,
                'category_id' => 6,
                'price' => 10,
                'is_active' => true
            ],
            [
                'name' => 'Hambúrguer',
                'seo_name' => 'hamburguer',
                'description' => 'Alface, Tomate, Milho, Batata Palha e Hambúrguer',
                'type' => 1,
                'category_id' => 6,
                'price' => 10,
                'is_active' => true
            ],
            [
                'name' => 'X-Burguer',
                'seo_name' => 'x_burguer',
                'description' => 'Batata Palha, Milho, Hambúrguer, Presunto e Mussarela',
                'type' => 1,
                'category_id' => 6,
                'price' => 10,
                'is_active' => true
            ],
            [
                'name' => 'X-Bacon',
                'seo_name' => 'x_bacon',
                'description' => 'Alface, Tomate, Milho, Batata Palha, Hambúrguer, Bacon, Presunto e Mussarela',
                'type' => 1,
                'category_id' => 6,
                'price' => 10,
                'is_active' => true
            ],
            [
                'name' => 'X-Salada',
                'seo_name' => 'x_salada',
                'description' => 'Alface, Tomate, Milho, Batata Palha, Hambúrguer, Presunto e Mussarela',
                'type' => 1,
                'category_id' => 6,
                'price' => 13,
                'is_active' => true
            ],
            [
                'name' => 'X-Calabresa',
                'seo_name' => 'x_calabresa',
                'description' => 'Alface, Tomate, Milho, Batata Palha, Hambúrguer, Calabresa, Presunto e Mussarela',
                'type' => 1,
                'category_id' => 6,
                'price' => 16,
                'is_active' => true
            ],
            [
                'name' => 'X-Egg',
                'seo_name' => 'x_egg',
                'description' => 'Alface, Tomate, Milho, Batata Palha, Hambúrguer, Ovo, Presunto e Mussarela',
                'type' => 1,
                'category_id' => 6,
                'price' => 15,
                'is_active' => true
            ],
            [
                'name' => 'X-Frango',
                'seo_name' => 'x_frango',
                'description' => 'Alface, Tomate, Milho, Batata Palha, Hambúrguer, Frango, Presunto e Mussarela',
                'type' => 1,
                'category_id' => 6,
                'price' => 20,
                'is_active' => true
            ],
            [
                'name' => 'X-Tudo',
                'seo_name' => 'x_tudo',
                'description' => 'Hambúrguer, Alface, Tomate, Milho, Bacon, Ovo, Calabresa, Frango, Salsicha, Cheddar, Catupiry, Presunto e Mussarela',
                'type' => 1,
                'category_id' => 6,
                'price' => 40,
                'is_active' => true
            ],
            [
                'name' => 'Brócolis',
                'seo_name' => 'brocolis',
                'description' => 'Brócolis',
                'type' => 2,
                'category_id' => 6,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Carne',
                'seo_name' => 'carne',
                'description' => 'Carne',
                'type' => 2,
                'category_id' => 6,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Salsicha',
                'seo_name' => 'salsicha',
                'description' => 'Salsicha',
                'type' => 2,
                'category_id' => 6,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Ovo',
                'seo_name' => 'ovo',
                'description' => 'Ovo',
                'type' => 2,
                'category_id' => 6,
                'price' => 2,
                'is_active' => true
            ],
            [
                'name' => 'Cebola',
                'seo_name' => 'cebola',
                'description' => 'Cebola',
                'type' => 2,
                'category_id' => 6,
                'price' => 1.50,
                'is_active' => true
            ],
            [
                'name' => 'Frango',
                'seo_name' => 'frango',
                'description' => 'Frango',
                'type' => 2,
                'category_id' => 6,
                'price' => 7,
                'is_active' => true
            ],
            [
                'name' => 'Bacon',
                'seo_name' => 'bacon',
                'description' => 'Bacon',
                'type' => 2,
                'category_id' => 6,
                'price' => 7,
                'is_active' => true
            ],
            [
                'name' => 'Calabresa',
                'seo_name' => 'calabresa',
                'description' => 'Calabresa',
                'type' => 2,
                'category_id' => 6,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Pão Francês',
                'seo_name' => 'pao_frances',
                'description' => 'Pão Francês',
                'type' => 2,
                'category_id' => 6,
                'price' => 2,
                'is_active' => true
            ],
            [
                'name' => 'Cheddar',
                'seo_name' => 'cheddar',
                'description' => 'Cheddar',
                'type' => 2,
                'category_id' => 6,
                'price' => 5,
                'is_active' => true
            ],
            [
                'name' => 'Catupiry',
                'seo_name' => 'catupiry',
                'description' => 'Catupiry',
                'type' => 2,
                'category_id' => 6,
                'price' => 5,
                'is_active' => true
            ],
            [
                'name' => 'Presunto/Mussarela',
                'seo_name' => 'presunto_/_Mussarela',
                'description' => 'Presunto/Mussarela',
                'type' => 2,
                'category_id' => 6,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Batata Frita',
                'seo_name' => 'batata_frita',
                'description' => 'Batata Frita',
                'type' => 2,
                'category_id' => 6,
                'price' => 7,
                'is_active' => true
            ],
            [
                'name' => 'Combo 1 - Individual',
                'seo_name' => 'combo_1_individual',
                'description' => '1 Lanche (X-Burguer ou Hambúrguer), 1 Refrigerante Lata e 1 Batata Frita de 180g',
                'type' => 1,
                'category_id' => 5,
                'price' => 18.99,
                'is_active' => true
            ],
            [
                'name' => 'Combo 2 - Individual',
                'seo_name' => 'combo_2_individual',
                'description' => '1 Lanche (X-Salada), 1 Refrigerante Lata e 1 Batata Frita de 180g',
                'type' => 1,
                'category_id' => 5,
                'price' => 21.99,
                'is_active' => true
            ],
            [
                'name' => 'Combo 3 - Individual',
                'seo_name' => 'combo_3_individual',
                'description' => '1 Lanche (X-Bacon ou X-Frango), 1 Refrigerante Lata e 1 Batata Frita de 180g',
                'type' => 1,
                'category_id' => 5,
                'price' => 27.99,
                'is_active' => true
            ],
            [
                'name' => 'Combo 4 - Casal',
                'seo_name' => 'combo_4_casal',
                'description' => '2 Lanches (X-Burguer ou Hambúrguer), 1 Refrigerante 1L (Coca ou Guaraná), 2 Batatas Fritas de 180g',
                'type' => 1,
                'category_id' => 5,
                'price' => 37.99,
                'is_active' => true
            ],
            [
                'name' => 'Combo 5 - Casal',
                'seo_name' => 'combo_5_casal',
                'description' => '2 Lanches (X-Salada), 1 Refrigerante 1L (Coca ou Guaraná), 2 Batatas Fritas de 180g',
                'type' => 1,
                'category_id' => 5,
                'price' => 43.99,
                'is_active' => true
            ],
            [
                'name' => 'Combo 6 - Casal',
                'seo_name' => 'combo_6_casal',
                'description' => '2 Lanches (X-Bacon ou X-Frango),1 Refrigerante 1L (Coca ou Guaraná), 2 Batatas Fritas de 180g',
                'type' => 1,
                'category_id' => 5,
                'price' => 55.99,
                'is_active' => true
            ],
            [
                'name' => 'Combo 7 - Família',
                'seo_name' => 'combo_6_familia',
                'description' => '4 Lanches (X-Burguer ou Hambúrguer), 1 Refrigerante 2L (Coca ou Guaraná ou Fanta), 1 Porção de Batata Frita de 1Kg',
                'type' => 1,
                'category_id' => 5,
                'price' => 71.99,
                'is_active' => true
            ],
            [
                'name' => 'Combo 8 - Família',
                'seo_name' => 'combo_8_familia',
                'description' => '4 Lanches (X-Salada), 1 Refrigerante 2L (Coca ou Guaraná ou Fanta), 1 Porção de Batata Frita de 1Kg',
                'type' => 1,
                'category_id' => 5,
                'price' => 82.99,
                'is_active' => true
            ],
            [
                'name' => 'Combo 9 - Família',
                'seo_name' => 'combo_9_familia',
                'description' => '4 Lanches (X-Bacon ou X-Frango), 1 Refrigerante 2L (Coca ou Guaraná ou Fanta), 1 Porção de Batata Frita de 1Kg',
                'type' => 1,
                'category_id' => 5,
                'price' => 106.99,
                'is_active' => true
            ],
            [
                'name' => 'Combo 10 - Família',
                'seo_name' => 'combo_10_familia',
                'description' => '4 Lanches (X-Tudo), 1 Coca Cola de 2 Litros, 1 Porção de Batata Frita de 1Kg | 159,99',
                'type' => 1,
                'category_id' => 5,
                'price' => 159.99,
                'is_active' => true
            ],
            [
                'name' => 'Carne',
                'seo_name' => 'carne',
                'description' => 'Carne',
                'type' => 1,
                'category_id' => 7,
                'price' => 8.50,
                'is_active' => true
            ],
            [
                'name' => 'Carne com Queijo',
                'seo_name' => 'carne_com_queijo',
                'description' => 'Carne com Queijo',
                'type' => 1,
                'category_id' => 7,
                'price' => 8.50,
                'is_active' => true
            ],
            [
                'name' => 'Queijo',
                'seo_name' => 'queijo',
                'description' => 'Queijo',
                'type' => 1,
                'category_id' => 7,
                'price' => 8.50,
                'is_active' => true
            ],
            [
                'name' => '3 queijos',
                'seo_name' => '3_queijos',
                'description' => 'Musssarela, Cheddar e Catupiry',
                'type' => 1,
                'category_id' => 7,
                'price' => 9.50,
                'is_active' => true
            ],
            [
                'name' => 'Pizza',
                'seo_name' => 'pizza',
                'description' => 'Tomate, Orégano, Presunto e Queijo',
                'type' => 1,
                'category_id' => 7,
                'price' => 8.50,
                'is_active' => true
            ],
            [
                'name' => 'Calabresa com Queijo',
                'seo_name' => 'calabresa_com_queijo',
                'description' => 'Mussarela e Calabresa',
                'type' => 1,
                'category_id' => 7,
                'price' => 8.50,
                'is_active' => true
            ],
            [
                'name' => 'Frango com Catupiry',
                'seo_name' => 'frango_com_catupiry',
                'description' => 'Frango com Catupiry',
                'type' => 1,
                'category_id' => 7,
                'price' => 8.50,
                'is_active' => true
            ],
            [
                'name' => 'Frango com Queijo',
                'seo_name' => 'frango_com_queijo',
                'description' => 'Frango com Queijo',
                'type' => 1,
                'category_id' => 7,
                'price' => 8.50,
                'is_active' => true
            ],
            [
                'name' => 'Bacon',
                'seo_name' => 'bacon',
                'description' => 'Bacon e Mussarela',
                'type' => 1,
                'category_id' => 7,
                'price' => 9.50,
                'is_active' => true
            ],
            [
                'name' => 'Brócolis com Bacon',
                'seo_name' => 'brocolis_com_bacon',
                'description' => 'Mussarela, Brócolis e Bacon',
                'type' => 1,
                'category_id' => 7,
                'price' => 10.50,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate',
                'seo_name' => 'Chocolate',
                'description' => 'Chocolate',
                'type' => 1,
                'category_id' => 7,
                'price' => 8.50,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Morango',
                'seo_name' => 'chocolate_com_morango',
                'description' => 'Chocolate, Morango e Leite Condensado',
                'type' => 1,
                'category_id' => 7,
                'price' => 9,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Banana',
                'seo_name' => 'chocolate_com_banana',
                'description' => 'Chocolate, Banana e Leite Condensado',
                'type' => 1,
                'category_id' => 7,
                'price' => 9,
                'is_active' => true
            ],
            [
                'name' => 'Carne',
                'seo_name' => 'carne',
                'description' => 'Carne',
                'type' => 2,
                'category_id' => 7,
                'price' => 2.50,
                'is_active' => true
            ],
            [
                'name' => 'Frango',
                'seo_name' => 'frango',
                'description' => 'Frango',
                'type' => 2,
                'category_id' => 7,
                'price' => 2.50,
                'is_active' => true
            ],
            [
                'name' => 'Bacon',
                'seo_name' => 'bacon',
                'description' => 'Bacon',
                'type' => 2,
                'category_id' => 7,
                'price' => 2.50,
                'is_active' => true
            ],
            [
                'name' => 'Calabresa',
                'seo_name' => 'calabresa',
                'description' => 'Calabresa',
                'type' => 2,
                'category_id' => 7,
                'price' => 2.50,
                'is_active' => true
            ],
            [
                'name' => 'Presunto',
                'seo_name' => 'presunto',
                'description' => 'Presunto',
                'type' => 2,
                'category_id' => 7,
                'price' => 2.50,
                'is_active' => true
            ],
            [
                'name' => 'Mussarela',
                'seo_name' => 'mussarela',
                'description' => 'Mussarela',
                'type' => 2,
                'category_id' => 7,
                'price' => 2.50,
                'is_active' => true
            ],
            [
                'name' => 'Cheddar',
                'seo_name' => 'cheddar',
                'description' => 'Cheddar',
                'type' => 2,
                'category_id' => 7,
                'price' => 2.50,
                'is_active' => true
            ],
            [
                'name' => 'Catupiry',
                'seo_name' => 'catupiry',
                'description' => 'Catupiry',
                'type' => 2,
                'category_id' => 7,
                'price' => 2.50,
                'is_active' => true
            ],
            [
                'name' => 'Açaí - 150ml',
                'seo_name' => 'acai_150ml',
                'description' => 'Açaí - 150ml',
                'type' => 1,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Açaí - 300ml',
                'seo_name' => 'acai_300ml',
                'description' => 'Açaí - 300ml',
                'type' => 1,
                'category_id' => 1,
                'price' => 7,
                'is_active' => true
            ],
            [
                'name' => 'Açaí - 500ml',
                'seo_name' => 'acai_500ml',
                'description' => 'Açaí - 500ml',
                'type' => 1,
                'category_id' => 1,
                'price' => 9,
                'is_active' => true
            ],
            [
                'name' => 'Açaí - 700ml',
                'seo_name' => 'acai_700ml',
                'description' => 'Açaí - 700ml',
                'type' => 1,
                'category_id' => 1,
                'price' => 11,
                'is_active' => true
            ],
            [
                'name' => 'Leite Condensado',
                'seo_name' => 'leite_condensado',
                'description' => 'Leite Condensado',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Confete',
                'seo_name' => 'confete',
                'description' => 'Confete',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate',
                'seo_name' => 'chocolate',
                'description' => 'Chocolate',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Paçoca',
                'seo_name' => 'pacoca',
                'description' => 'Paçoca',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Morango',
                'seo_name' => 'morango',
                'description' => 'Morango',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Leite em Pó',
                'seo_name' => 'leite_em_po',
                'description' => 'Leite em Pó',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Chocobol',
                'seo_name' => 'chocobol',
                'description' => 'Chocobol',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate de Avelã',
                'seo_name' => 'chocolate_de_avela',
                'description' => 'Chocolate de Avelã',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate Granulado',
                'seo_name' => 'chocolate_granulado',
                'description' => 'Chocolate Granulado',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Granola',
                'seo_name' => 'granola',
                'description' => 'Granola',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Neston',
                'seo_name' => 'neston',
                'description' => 'Neston',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Sucrilhos',
                'seo_name' => 'sucrilhos',
                'description' => 'Sucrilhos',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Bombom',
                'seo_name' => 'bombom',
                'description' => 'Bombom',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Beijinho',
                'seo_name' => 'beijinho',
                'description' => 'Beijinho',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Banana',
                'seo_name' => 'banana',
                'description' => 'Banana',
                'type' => 2,
                'category_id' => 1,
                'price' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Calabresa com Cebola - Média',
                'seo_name' => 'calabresa_com_cebola_media',
                'description' => 'Calabresa com Cebola 500g',
                'type' => 1,
                'category_id' => 2,
                'price' => 25,
                'is_active' => true
            ],
            [
                'name' => 'Calabresa com Cebola - Grande',
                'seo_name' => 'calabresa_com_cebola_grande',
                'description' => 'Calabresa com Cebola 1Kg',
                'type' => 1,
                'category_id' => 2,
                'price' => 46,
                'is_active' => true
            ],
            [
                'name' => 'Filé de Frango - Média',
                'seo_name' => 'file_de_frango_media',
                'description' => 'Filé de Frango 500g',
                'type' => 1,
                'category_id' => 2,
                'price' => 25,
                'is_active' => true
            ],
            [
                'name' => 'Filé de Frango - Grande',
                'seo_name' => 'file_de_frango_grande',
                'description' => 'Filé de Frango 1Kg',
                'type' => 1,
                'category_id' => 2,
                'price' => 46,
                'is_active' => true
            ],
            [
                'name' => 'Filé de Frango, Queijo e Catupiry - Média',
                'seo_name' => 'file_de_frango_queijo_e_catupiry_media',
                'description' => 'Filé de Frango, Queijo e Catupiry 500g',
                'type' => 1,
                'category_id' => 2,
                'price' => 34,
                'is_active' => true
            ],
            [
                'name' => 'Filé de Frango, Queijo e Catupiry - Grande',
                'seo_name' => 'file_de_frango_queijo_e_catupiry_grande',
                'description' => 'Filé de Frango, Queijo e Catupiry 1Kg',
                'type' => 1,
                'category_id' => 2,
                'price' => 55,
                'is_active' => true
            ],
            [
                'name' => 'Contra Filé - Média',
                'seo_name' => 'contra_file_media',
                'description' => 'Contra Filé 500g',
                'type' => 1,
                'category_id' => 2,
                'price' => 39,
                'is_active' => true
            ],
            [
                'name' => 'Contra Filé - Grande',
                'seo_name' => 'contra_file_grande',
                'description' => 'Contra Filé 1Kg',
                'type' => 1,
                'category_id' => 2,
                'price' => 78,
                'is_active' => true
            ],
            [
                'name' => 'Batata Frita - Média',
                'seo_name' => 'batata_frita_media',
                'description' => 'Batata Frita 500g',
                'type' => 1,
                'category_id' => 2,
                'price' => 18,
                'is_active' => true
            ],
            [
                'name' => 'Batata Frita - Grande',
                'seo_name' => 'batata_frita_grande',
                'description' => 'Batata Frita 1Kg',
                'type' => 1,
                'category_id' => 2,
                'price' => 25,
                'is_active' => true
            ],
            [
                'name' => 'Batata Frita e Queijo - Média',
                'seo_name' => 'batata_frita_e_queijo_media',
                'description' => 'Batata Frita e Queijo 500g',
                'type' => 1,
                'category_id' => 2,
                'price' => 23,
                'is_active' => true
            ],
            [
                'name' => 'Batata Frita e Queijo - Grande',
                'seo_name' => 'batata_frita_e_queijo_grande',
                'description' => 'Batata Frita e Queijo 1Kg',
                'type' => 1,
                'category_id' => 2,
                'price' => 34,
                'is_active' => true
            ],  
            [
                'name' => 'Batata Frita, Queijo e Bacon - Média',
                'seo_name' => 'batata_frita_queijo_e_bacon_media',
                'description' => 'Batata Frita, Queijo e Bacon 500g',
                'type' => 1,
                'category_id' => 2,
                'price' => 28,
                'is_active' => true
            ],
            [
                'name' => 'Batata Frita, Queijo e Bacon - Grande',
                'seo_name' => 'batata_frita_queijo_e_bacon_grande',
                'description' => 'Batata Frita, Queijo e Bacon 1Kg',
                'type' => 1,
                'category_id' => 2,
                'price' => 40,
                'is_active' => true
            ],
            [
                'name' => 'Batata Frita, Queijo, Bacon, Catupiry e Cheddar - Média',
                'seo_name' => 'batata_frita_queijo_bacon_catupiry_e_cheddar_media',
                'description' => 'Batata Frita, Queijo, Bacon, Catupiry e Cheddar 500g',
                'type' => 1,
                'category_id' => 2,
                'price' => 35,
                'is_active' => true
            ],
            [
                'name' => 'Batata Frita, Queijo, Bacon, Catupiry e Cheddar - Grande',
                'seo_name' => 'batata_frita_queijo_bacon_catupiry_e_cheddar_grande',
                'description' => 'Batata Frita, Queijo, Bacon, Catupiry e Cheddar 1Kg',
                'type' => 1,
                'category_id' => 2,
                'price' => 50,
                'is_active' => true
            ],
            [
                'name' => 'Batata Frita, Queijo, Bacon, Catupiry, Cheddar e Calabresa - Média',
                'seo_name' => 'batata_frita_queijo_bacon_catupiry_cheddar_e_calabresa_media',
                'description' => 'Batata Frita, Queijo, Bacon, Catupiry, Cheddar e Calabresa 500g',
                'type' => 1,
                'category_id' => 2,
                'price' => 43,
                'is_active' => true
            ],
            [
                'name' => 'Batata Frita, Queijo, Bacon, Catupiry, Cheddar e Calabresa - Grande',
                'seo_name' => 'batata_frita_queijo_bacon_catupiry_cheddar_e_calabresa_grande',
                'description' => 'Batata Frita, Queijo, Bacon, Catupiry, Cheddar e Calabresa 1Kg',
                'type' => 1,
                'category_id' => 2,
                'price' => 60,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate - Grande',
                'seo_name' => 'chocolate_grande',
                'description' => 'Chocolate',
                'type' => 1,
                'category_id' => 3,
                'price' => 40,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate - Brotão',
                'seo_name' => 'chocolate_brotao',
                'description' => 'Chocolate',
                'type' => 1,
                'category_id' => 3,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate - Brotinho',
                'seo_name' => 'chocolate_brotinho',
                'description' => 'Chocolate',
                'type' => 1,
                'category_id' => 3,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Morango - Grande',
                'seo_name' => 'chocolate_com_morango_grande',
                'description' => 'Chocolate, Morango e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Morango - Brotão',
                'seo_name' => 'chocolate_com_morango_brotao',
                'description' => 'Chocolate, Morango e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Morango - Brotinho',
                'seo_name' => 'chocolate_com_morango_brotinho',
                'description' => 'Chocolate, Morango e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Banana - Grande',
                'seo_name' => 'chocolate_com_banana_grande',
                'description' => 'Chocolate, Banana e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Banana - Brotão',
                'seo_name' => 'chocolate_com_banana_brotao',
                'description' => 'Chocolate, Banana e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Banana - Brotinho',
                'seo_name' => 'chocolate_com_banana_brotinho',
                'description' => 'Chocolate, Banana e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Confete - Grande',
                'seo_name' => 'chocolate_com_confete_grande',
                'description' => 'Chocolate, Confete e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Confete - Brotão',
                'seo_name' => 'chocolate_com_confete_brotao',
                'description' => 'Chocolate, Confete e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Confete - Brotinho',
                'seo_name' => 'chocolate_com_confete_brotinho',
                'description' => 'Chocolate, Confete e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Chocobol - Grande',
                'seo_name' => 'chocolate_com_chocobol_grande',
                'description' => 'Chocolate, Chocobol e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Chocobol - Brotão',
                'seo_name' => 'chocolate_com_chocobol_brotao',
                'description' => 'Chocolate, Chocobol e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Chocobol - Brotinho',
                'seo_name' => 'chocolate_com_chocobol_brotinho',
                'description' => 'Chocolate, Chocobol e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Bombom - Grande',
                'seo_name' => 'chocolate_com_bombom_grande',
                'description' => 'Chocolate, Sonho de Valsa ou Ouro Branco e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Bombom - Brotão',
                'seo_name' => 'chocolate_com_bombom_brotao',
                'description' => 'Chocolate, Sonho de Valsa ou Ouro Branco e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Chocolate com Bombom - Brotinho',
                'seo_name' => 'chocolate_com_bombom_brotinho',
                'description' => 'Chocolate, Sonho de Valsa ou Ouro Branco e Leite Condensado',
                'type' => 1,
                'category_id' => 3,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Moda do Cliente - Grande',
                'seo_name' => 'moda_do_cliente_grande',
                'description' => 'Chocolate, Leite Condensado, Pode escolher o chocolate (Laka, Diamante Negro, Suflair, Prestígio, Kinder Bueno ou Trento)',
                'type' => 1,
                'category_id' => 3,
                'price' => 55,
                'is_active' => true
            ],
            [
                'name' => 'Moda do Cliente - Brotão',
                'seo_name' => 'moda_do_cliente_brotao',
                'description' => 'Chocolate, Leite Condensado, Pode escolher o chocolate (Laka, Diamante Negro, Suflair, Prestígio, Kinder Bueno ou Trento)',
                'type' => 1,
                'category_id' => 3,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Moda do Cliente - Brotinho',
                'seo_name' => 'moda_do_cliente_brotinho',
                'description' => 'Chocolate, Leite Condensado, Pode escolher o chocolate (Laka, Diamante Negro, Suflair, Prestígio, Kinder Bueno ou Trento)',
                'type' => 1,
                'category_id' => 3,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Mista - Grande',
                'seo_name' => 'mista_grande',
                'description' => 'Molho de Tomate, Mussarela, Presunto e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 40,
                'is_active' => true
            ],
            [
                'name' => 'Mista - Brotão',
                'seo_name' => 'mista_brotao',
                'description' => 'Molho de Tomate, Mussarela, Presunto e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Mista - Brotinho',
                'seo_name' => 'mista_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Presunto e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Mussarela - Grande',
                'seo_name' => 'mussarela_grande',
                'description' => 'Molho de Tomate, Mussarela, e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 38,
                'is_active' => true
            ],
            [
                'name' => 'Mussarela - Brotão',
                'seo_name' => 'mussarela_brotao',
                'description' => 'Molho de Tomate, Mussarela, e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Mussarela - Brotinho',
                'seo_name' => 'mussarela_brotinho',
                'description' => 'Molho de Tomate, Mussarela, e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Marguerita - Grande',
                'seo_name' => 'marguerita_grande',
                'description' => 'Molho de Tomate, Mussarela, Cebola, Tomate, Manjericão e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 43,
                'is_active' => true
            ],
            [
                'name' => 'Marguerita - Brotão',
                'seo_name' => 'marguerita_brotao',
                'description' => 'Molho de Tomate, Mussarela, Cebola, Tomate, Manjericão e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Marguerita - Brotinho',
                'seo_name' => 'marguerita_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Cebola, Tomate, Manjericão e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Palmito- Grande',
                'seo_name' => 'palmito_grande',
                'description' => 'Molho de Tomate, Mussarela, Palmito e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 46,
                'is_active' => true
            ],
            [
                'name' => 'Palmito- Brotão',
                'seo_name' => 'palmito_brotao',
                'description' => 'Molho de Tomate, Mussarela, Palmito e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Palmito- Brotinho',
                'seo_name' => 'palmito_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Palmito e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Chamusca - Grande',
                'seo_name' => 'chamusca_grande',
                'description' => 'Molho de Tomate, Frango Desfiado, Bacon, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Chamusca - Brotão',
                'seo_name' => 'chamusca_brotao',
                'description' => 'Molho de Tomate, Frango Desfiado, Bacon, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Chamusca - Brotinho',
                'seo_name' => 'chamusca_brotinho',
                'description' => 'Molho de Tomate, Frango Desfiado, Bacon, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Frango com Catupiry - Grande',
                'seo_name' => 'frango_com_catupiry_grande',
                'description' => 'Molho de Tomate, Frango Desfiado, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 40,
                'is_active' => true
            ],
            [
                'name' => 'Frango com Catupiry - Brotão',
                'seo_name' => 'frango_com_catupiry_brotao',
                'description' => 'Molho de Tomate, Frango Desfiado, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Frango com Catupiry - Brotinho',
                'seo_name' => 'frango_com_catupiry_brotinho',
                'description' => 'Molho de Tomate, Frango Desfiado, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Veneza - Grande',
                'seo_name' => 'veneza_grande',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Parmesão, Bacon e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 49,
                'is_active' => true
            ],
            [
                'name' => 'Veneza - Brotão',
                'seo_name' => 'veneza_brotao',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Parmesão, Bacon e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Veneza - Brotinho',
                'seo_name' => 'veneza_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Parmesão, Bacon e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => '4 Queijos - Grande',
                'seo_name' => '4_queijos_grande',
                'description' => 'Molho de Tomate, Mussarela, Parmesão, Catupiry, Cheddar e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 49,
                'is_active' => true
            ],
            [
                'name' => '4 Queijos - Brotão',
                'seo_name' => '4_queijos_brotao',
                'description' => 'Molho de Tomate, Mussarela, Parmesão, Catupiry, Cheddar e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => '4 Queijos - Brotinho',
                'seo_name' => '4_queijos_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Parmesão, Catupiry, Cheddar e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Peruana - Grande',
                'seo_name' => 'peruana_grande',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Ervilha, Palmito, Cebola, Ovo e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 49,
                'is_active' => true
            ],
            [
                'name' => 'Peruana - Brotão',
                'seo_name' => 'peruana_brotao',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Ervilha, Palmito, Cebola, Ovo e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Peruana - Brotinho',
                'seo_name' => 'peruana_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Ervilha, Palmito, Cebola, Ovo e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Napolitana - Grande',
                'seo_name' => 'napolitana_grande',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Tomate e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Napolitana - Brotão',
                'seo_name' => 'napolitana_brotao',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Tomate e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Napolitana - Brotinho',
                'seo_name' => 'napolitana_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Tomate e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Portuguesa - Grande',
                'seo_name' => 'portuguesa_grande',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Ovo, Milho, Ervilha, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 49,
                'is_active' => true
            ],
            [
                'name' => 'Portuguesa - Brotão',
                'seo_name' => 'portuguesa_brotao',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Ovo, Milho, Ervilha, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Portuguesa - Brotinho',
                'seo_name' => 'portuguesa_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Ovo, Milho, Ervilha, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Toscana - Grande',
                'seo_name' => 'toscana_grande',
                'description' => 'Molho de Tomate, Mussarela, Calabresa, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 46,
                'is_active' => true
            ],
            [
                'name' => 'Toscana - Brotão',
                'seo_name' => 'toscana_brotao',
                'description' => 'Molho de Tomate, Mussarela, Calabresa, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Toscana - Brotinho',
                'seo_name' => 'toscana_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Calabresa, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Vegetariana - Grande',
                'seo_name' => 'vegetariana_grande',
                'description' => 'Molho de Tomate, Mussarela, Palmito, Ervilha, Milho, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 46,
                'is_active' => true
            ],
            [
                'name' => 'Vegetariana - Brotão',
                'seo_name' => 'vegetariana_brotao',
                'description' => 'Molho de Tomate, Mussarela, Palmito, Ervilha, Milho, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Vegetariana - Brotinho',
                'seo_name' => 'vegetariana_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Palmito, Ervilha, Milho, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Brócolis - Grande',
                'seo_name' => 'brocolis_grande',
                'description' => 'Molho de Tomate, Mussarela, Catupiry, Brócolis, Bacon e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 49,
                'is_active' => true
            ],
            [
                'name' => 'Brócolis - Brotão',
                'seo_name' => 'brocolis_brotao',
                'description' => 'Molho de Tomate, Mussarela, Catupiry, Brócolis, Bacon e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Brócolis - Brotinho',
                'seo_name' => 'brocolis_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Catupiry, Brócolis, Bacon e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Atum - Grande',
                'seo_name' => 'atum_grande',
                'description' => 'Molho de Tomate, Mussarela, Tomate, Cebola,Atum e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 49,
                'is_active' => true
            ],
            [
                'name' => 'Atum - Brotão',
                'seo_name' => 'atum_brotao',
                'description' => 'Molho de Tomate, Mussarela, Tomate, Cebola,Atum e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Atum - Brotinho',
                'seo_name' => 'atum_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Tomate, Cebola,Atum e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Calabresa - Grande',
                'seo_name' => 'calabresa_grande',
                'description' => 'Molho de Tomate, Calabresa, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 35,
                'is_active' => true
            ],
            [
                'name' => 'Calabresa - Brotão',
                'seo_name' => 'calabresa_brotao',
                'description' => 'Molho de Tomate, Calabresa, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Calabresa - Brotinho',
                'seo_name' => 'calabresa_brotinho',
                'description' => 'Molho de Tomate, Calabresa, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Alho e Óleo  - Grande',
                'seo_name' => 'alho_e_oleo _grande',
                'description' => 'Molho de Tomate, Mussarela, Alho e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 40,
                'is_active' => true
            ],
            [
                'name' => 'Alho e Óleo  - Brotão',
                'seo_name' => 'alho_e_oleo _brotao',
                'description' => 'Molho de Tomate, Mussarela, Alho e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Alho e Óleo  - Brotinho',
                'seo_name' => 'alho_e_oleo _brotinho',
                'description' => 'Molho de Tomate, Mussarela, Alho e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Bacon  - Grande',
                'seo_name' => 'bacon_grande',
                'description' => 'Molho de Tomate, Mussarela, Bacon e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Bacon  - Brotão',
                'seo_name' => 'bacon_brotao',
                'description' => 'Molho de Tomate, Mussarela, Bacon e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Bacon  - Brotinho',
                'seo_name' => 'bacon_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Bacon e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Caipira - Grande',
                'seo_name' => 'caipira_grande',
                'description' => 'Molho de Tomate, Frango Desfiado, Milho, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 42,
                'is_active' => true
            ],
            [
                'name' => 'Caipira - Brotão',
                'seo_name' => 'caipira_brotao',
                'description' => 'Molho de Tomate, Frango Desfiado, Milho, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Caipira - Brotinho',
                'seo_name' => 'caipira_brotinho',
                'description' => 'Molho de Tomate, Frango Desfiado, Milho, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Caipira 2 - Grande',
                'seo_name' => 'caipira_2_grande',
                'description' => 'Molho de Tomate, Mussarela, Frango Desfiado, Milho, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 49,
                'is_active' => true
            ],
            [
                'name' => 'Caipira 2 - Brotão',
                'seo_name' => 'caipira_2_brotao',
                'description' => 'Molho de Tomate, Mussarela, Frango Desfiado, Milho, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Caipira 2 - Brotinho',
                'seo_name' => 'caipira_2_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Frango Desfiado, Milho, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Chamusca 2 - Grande',
                'seo_name' => 'chamusca_2_grande',
                'description' => 'Molho de Tomate, Mussarela, Frango Desfiado, Bacon, Catupiry e Azeitona ',
                'type' => 1,
                'category_id' => 4,
                'price' => 49,
                'is_active' => true
            ],
            [
                'name' => 'Chamusca 2 - Brotão',
                'seo_name' => 'chamusca_2_brotao',
                'description' => 'Molho de Tomate, Mussarela, Frango Desfiado, Bacon, Catupiry e Azeitona ',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Chamusca 2 - Brotinho',
                'seo_name' => 'chamusca_2_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Frango Desfiado, Bacon, Catupiry e Azeitona ',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Frango com Catupiry 2 - Grande',
                'seo_name' => 'frango_com_catupiry_2_grande',
                'description' => 'Molho de Tomate, Mussarela, Frango Desfiado, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 49,
                'is_active' => true
            ],
            [
                'name' => 'Frango com Catupiry 2 - Brotão',
                'seo_name' => 'frango_com_catupiry_2_brotao',
                'description' => 'Molho de Tomate, Mussarela, Frango Desfiado, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Frango com Catupiry 2 - Brotinho',
                'seo_name' => 'frango_com_catupiry_2_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Frango Desfiado, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Toscana com Catupiry - Grande',
                'seo_name' => 'toscana_com_catupiry_grande',
                'description' => 'Molho de Tomate, Mussarela, Calabresa, Catupiry, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 52,
                'is_active' => true
            ],
            [
                'name' => 'Toscana com Catupiry - Brotão',
                'seo_name' => 'toscana_com_catupiry_brotao',
                'description' => 'Molho de Tomate, Mussarela, Calabresa, Catupiry, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Toscana com Catupiry - Brotinho',
                'seo_name' => 'toscana_com_catupiry_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Calabresa, Catupiry, Cebola e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Bacon Especial - Grande',
                'seo_name' => 'bacon_especial_grande',
                'description' => 'Molho de Tomate, Mussarela, Bacon, Milho, Calabresa, Catupiry, Tomate e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 55,
                'is_active' => true
            ],
            [
                'name' => 'Bacon Especial - Brotão',
                'seo_name' => 'bacon_especial_brotao',
                'description' => 'Molho de Tomate, Mussarela, Bacon, Milho, Calabresa, Catupiry, Tomate e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Bacon Especial - Brotinho',
                'seo_name' => 'bacon_especial_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Bacon, Milho, Calabresa, Catupiry, Tomate e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Francesa - Grande',
                'seo_name' => 'francesa_grande',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Catupiry, Ovo, e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 49,
                'is_active' => true
            ],
            [
                'name' => 'Francesa - Brotão',
                'seo_name' => 'francesa_brotao',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Catupiry, Ovo, e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 33,
                'is_active' => true
            ],
            [
                'name' => 'Francesa - Brotinho',
                'seo_name' => 'francesa_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Presunto, Catupiry, Ovo, e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ],
            [
                'name' => 'Lombinho com Catupiry - Grande',
                'seo_name' => 'lombinho_com_catupiry_grande',
                'description' => 'Molho de Tomate, Mussarela, Lombinho, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 55,
                'is_active' => true
            ],
            [
                'name' => 'Lombinho com Catupiry - Brotão',
                'seo_name' => 'lombinho_com_catupiry_brotao',
                'description' => 'Molho de Tomate, Mussarela, Lombinho, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 55,
                'is_active' => true
            ],
            [
                'name' => 'Lombinho com Catupiry - Brotinho',
                'seo_name' => 'lombinho_com_catupiry_brotinho',
                'description' => 'Molho de Tomate, Mussarela, Lombinho, Catupiry e Azeitona',
                'type' => 1,
                'category_id' => 4,
                'price' => 12,
                'is_active' => true
            ]
        );


        DB::table('products')->insert($products);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::dropIfExists('configs');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
};

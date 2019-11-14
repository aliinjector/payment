<?php

use Illuminate\Database\Seeder;

class ShopCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_categories')->insert([
            'name' => 'الکترونیکی',
            'description' => 'فروش کالای الکترونیکی',
            'parent_id' => null,
        ]);

        DB::table('shop_categories')->insert([
            'name' => 'پوشاک',
            'description' => 'فروش کالای پوشاک',
            'parent_id' => null,
        ]);


        DB::table('shop_categories')->insert([
            'name' => 'خاروبار',
            'description' => 'فروش کالای خاروبار',
            'parent_id' => null,
        ]);




    }
}

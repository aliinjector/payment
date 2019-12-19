<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('colors')->insert([
          'name' => 'آبی روشن',
          'code' => '00FFFF',
      ]);



      DB::table('colors')->insert([
          'name' => 'کرم',
          'code' => 'FFE4C4',
      ]);


      DB::table('colors')->insert([
          'name' => 'مشکی',
          'code' => '000000',
      ]);


      DB::table('colors')->insert([
          'name' => 'آبی',
          'code' => '0000FF',
      ]);


      DB::table('colors')->insert([
          'name' => 'بنفش',
          'code' => '8A2BE2',
      ]);


      DB::table('colors')->insert([
          'name' => 'سبز روشن',
          'code' => '7FFF00',
      ]);


      DB::table('colors')->insert([
          'name' => 'نارنجی روشن',
          'code' => 'FF7F50',
      ]);


      DB::table('colors')->insert([
          'name' => 'آبی نفتی',
          'code' => '6495ED',
      ]);


      DB::table('colors')->insert([
          'name' => 'سرمه ای',
          'code' => '00008B',
      ]);


      DB::table('colors')->insert([
          'name' => 'خاکستری',
          'code' => 'A9A9A9',
      ]);


      DB::table('colors')->insert([
          'name' => 'سبز تیره',
          'code' => '006400',
      ]);


      DB::table('colors')->insert([
          'name' => 'نارنجی',
          'code' => 'FF8C00',
      ]);


      DB::table('colors')->insert([
          'name' => 'سرخ آبی',
          'code' => 'FF1493',
      ]);


      DB::table('colors')->insert([
          'name' => 'سبز',
          'code' => '008000',
      ]);


      DB::table('colors')->insert([
          'name' => 'سبز فسفری',
          'code' => '00FF00',
      ]);


      DB::table('colors')->insert([
          'name' => 'قرمز',
          'code' => 'FF0000',
      ]);


      DB::table('colors')->insert([
          'name' => 'زرد',
          'code' => 'FFFF00',
      ]);


      DB::table('colors')->insert([
          'name' => 'سفید',
          'code' => 'FFFFFF',
      ]);


    }
}

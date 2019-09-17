<?php

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            'name' => 'اقتصاد نوین',
            'icon' => '/images/banks/eq.png',
            'nameEn' => 'eq',
        ]);

        DB::table('banks')->insert([
            'name' => 'انصار',
            'icon' => '/images/banks/ansar.png',
            'nameEn' => 'ansar',
        ]);

        DB::table('banks')->insert([
            'name' => 'ایران زمین',
            'icon' => '/images/banks/iranzamin.png',
            'nameEn' => 'iranzamin',
        ]);

        DB::table('banks')->insert([
            'name' => 'پارسیان',
            'icon' => '/images/banks/parsian.png',
            'nameEn' => 'parsian',
        ]);

        DB::table('banks')->insert([
            'name' => 'پاسارگاد',
            'icon' => '/images/banks/pasargad.png',
            'nameEn' => 'pasargad',
        ]);

        DB::table('banks')->insert([
            'name' => 'تات',
            'icon' => '/images/banks/taat.png',
            'nameEn' => 'taat',
        ]);

        DB::table('banks')->insert([
            'name' => 'تجارت',
            'icon' => '/images/banks/tejarat.jpg',
            'nameEn' => 'tejarat',
        ]);

        DB::table('banks')->insert([
            'name' => 'توسعه تعاون',
            'icon' => '/images/banks/tt.png',
            'nameEn' => 'tt',
        ]);

        DB::table('banks')->insert([
            'name' => 'توسعه صادرات ایران',
            'icon' => '/images/banks/saderat.png',
            'nameEn' => 'saderat',
        ]);

        DB::table('banks')->insert([
            'name' => 'حکمت ایرانیان',
            'icon' => '/images/banks/hekmat.png',
            'nameEn' => 'hekmat',
        ]);

        DB::table('banks')->insert([
            'name' => 'دی',
            'icon' => '/images/banks/dey.png',
            'nameEn' => 'dey',
        ]);

        DB::table('banks')->insert([
            'name' => 'رفاه کارگران',
            'icon' => '/images/banks/refah.png',
            'nameEn' => 'refah',
        ]);

        DB::table('banks')->insert([
            'name' => 'سامان',
            'icon' => '/images/banks/saman.png',
            'nameEn' => 'saman',
        ]);

        DB::table('banks')->insert([
            'name' => 'سپه',
            'icon' => '/images/banks/sepah.png',
            'nameEn' => 'sepah',
        ]);

        DB::table('banks')->insert([
            'name' => 'سرمایه',
            'icon' => '/images/banks/sarmayeh.png',
            'nameEn' => 'sarmayeh',
        ]);

        DB::table('banks')->insert([
            'name' => 'سینا',
            'icon' => '/images/banks/sina.png',
            'nameEn' => 'sina',
        ]);

        DB::table('banks')->insert([
            'name' => 'شهر',
            'icon' => '/images/banks/shahr.png',
            'nameEn' => 'shahr',
        ]);

        DB::table('banks')->insert([
            'name' => 'صادرات ایران',
            'icon' => '/images/banks/saderat.png',
            'nameEn' => 'saderat',
        ]);

        DB::table('banks')->insert([
            'name' => 'صنعت و معدن',
            'icon' => '/images/banks/sm.png',
            'nameEn' => 'sm',
        ]);

        DB::table('banks')->insert([
            'name' => 'قرض الحسنه مهر ایران',
            'icon' => '/images/banks/mehriran.png',
            'nameEn' => 'mehriran',
        ]);

        DB::table('banks')->insert([
            'name' => 'قوامین',
            'icon' => '/images/banks/ghavamin.png',
            'nameEn' => 'ghavamin',
        ]);

        DB::table('banks')->insert([
            'name' => 'کارآفرین',
            'icon' => '/images/banks/kaarafarin.png',
            'nameEn' => 'kaarafarin',
        ]);

        DB::table('banks')->insert([
            'name' => 'کشاورزی',
            'icon' => '/images/banks/keshavarzi.png',
            'nameEn' => 'keshavarzi',
        ]);

        DB::table('banks')->insert([
            'name' => 'گردشگری',
            'icon' => '/images/banks/gardeshgari.png',
            'nameEn' => 'gardeshgari',
        ]);

        DB::table('banks')->insert([
            'name' => 'مرکزی',
            'icon' => '/images/banks/markazi.png',
            'nameEn' => 'markazi',
        ]);

        DB::table('banks')->insert([
            'name' => 'مسکن',
            'icon' => '/images/banks/maskan.png',
            'nameEn' => 'maskan',
        ]);

        DB::table('banks')->insert([
            'name' => 'ملت',
            'icon' => '/images/banks/mellat.png',
            'nameEn' => 'mellat',
        ]);

        DB::table('banks')->insert([
            'name' => 'ملی ایران',
            'icon' => '/images/banks/melli.png',
            'nameEn' => 'melli',
        ]);

        DB::table('banks')->insert([
            'name' => 'مهر اقتصاد',
            'icon' => '/images/banks/mehreqtesad.png',
            'nameEn' => 'mehreqtesad',
        ]);

        DB::table('banks')->insert([
            'name' => 'پست بانک ایران',
            'icon' => '/images/banks/post.png',
            'nameEn' => 'post',
        ]);

        DB::table('banks')->insert([
            'name' => 'موسسه اعتباری توسعه',
            'icon' => '/images/banks/tosee.png',
            'nameEn' => 'tosee',
        ]);

        DB::table('banks')->insert([
            'name' => 'موسسه اعتباری کوثر',
            'icon' => '/images/banks/kosar.png',
            'nameEn' => 'kosar',
        ]);


    }
}

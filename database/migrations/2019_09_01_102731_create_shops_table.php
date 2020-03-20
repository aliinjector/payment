<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('english_name')->unique();
            $table->string('url')->nullable();
            $table->unsignedInteger('user_id');
            $table->bigInteger('category_id')->unsigned()->index();
            $table->unsignedInteger('contact_id')->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->enum('quick_way',['enable', 'disable'])->default('disable');
            $table->bigInteger('quick_way_price')->default(0);
            $table->enum('posting_way',['enable', 'disable'])->default('disable');
            $table->bigInteger('posting_way_price')->default(0);
            $table->enum('person_way',['enable', 'disable'])->default('disable');
            $table->bigInteger('person_way_price')->default(0);
            $table->enum('online_payment',['enable', 'disable'])->default('enable');
            $table->enum('cash_payment',['enable', 'disable'])->default('enable');
            $table->enum('menu_show',['nestead_menu', 'nestead_box', 'mega_menu'])->default('nestead_menu');
            $table->int('menu_show_count')->default(5);
            $table->text('slide_category')->nullable();
            $table->enum('cat_image_status',['enable', 'disable'])->default('disable');
            $table->enum('VAT',['enable', 'disable'])->default('disable');
            $table->enum('special_offer',['enable', 'disable'])->default('disable');
            $table->text('special_offer_text')->default('خوش آمدید')->nullable();
            $table->unsignedInteger('VAT_amount')->default(9);
            $table->text('icon')->nullable();
            $table->text('logo')->nullable();
            $table->text('watermark')->nullable();
            $table->enum('watermark_status',['enable', 'disable'])->default('disable');
            $table->enum('buyCount_show',['enable', 'disable'])->default('disable');
            $table->string('description');
            $table->unsignedInteger('template_id')->default(1);
            $table->timestamps();
            $table->softDeletes();




            $table->foreign('category_id')->references('id')->on('shop_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}

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
            $table->unsignedInteger('user_id');
            $table->bigInteger('category_id')->unsigned()->index();
            $table->unsignedInteger('contact_id')->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->enum('quick_way',['enable', 'disable'])->default('disable');
            $table->enum('posting_way',['enable', 'disable'])->default('disable');
            $table->enum('person_way',['enable', 'disable'])->default('disable');
            $table->enum('menu_show',['nestead_menu', 'nestead_box'])->default('nestead_menu');
            $table->enum('VAT',['enable', 'disable'])->default('disable');
            $table->unsignedInteger('VAT_amount')->default(9);
            $table->text('icon')->nullable();
            $table->text('logo')->nullable();
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

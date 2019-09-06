<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('shop_id');
            $table->string('tel')->nullable();
            $table->string('phone');
            $table->string('shop_email')->nullable();
            $table->string('address')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('telegram_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_contacts');
    }
}

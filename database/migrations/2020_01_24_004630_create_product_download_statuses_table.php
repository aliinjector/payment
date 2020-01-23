<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDownloadStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_download_statuses', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('product_id')->unsigned()->index();
          $table->bigInteger('shop_id')->unsigned()->index();
          $table->bigInteger('user_purchase_id')->unsigned()->index();
          $table->timestamps();


          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('user_purchase_id')->references('id')->on('user_purchases')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_download_statuses');
    }
}

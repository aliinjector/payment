<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_product', function (Blueprint $table) {
          $table->bigInteger('color_id')->unsigned()->index();
          $table->bigInteger('product_id')->unsigned()->index();
          $table->timestamps();

          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_product');
    }
}

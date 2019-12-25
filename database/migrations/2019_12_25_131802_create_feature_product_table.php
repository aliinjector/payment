<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_product', function (Blueprint $table) {
          $table->bigIncrements('id')->unsigned();
          $table->bigInteger('feature_id')->unsigned()->index();
          $table->bigInteger('product_id')->unsigned()->index();
          $table->timestamps();



          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_product');
    }
}

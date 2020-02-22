<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned()->index();
            $table->bigInteger('cart_id')->unsigned()->index();
            $table->integer('quantity')->default(1);
            $table->bigInteger('color_id')->unsigned()->index()->nullable();
            $table->integer('total_price')->nullable();
            $table->text('specification')->nullable();
            $table->bigInteger('specification_price')->default(0);
            $table->enum('download_status',['0', '1'])->default(0);
            $table->timestamps();
            $table->softDeletes( );



            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_product');
    }
}

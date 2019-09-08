<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('shop_id');
            $table->string('title');
            $table->unsignedInteger('productCat_id');
            $table->unsignedInteger('status')->default(0);
            $table->string('type');
            $table->text('description');
            $table->text('image')->nullable();
            $table->text('color')->nullable();
            $table->integer('viewCount')->default(0);
            $table->integer('amount');
            $table->integer('weight')->nullable();
            $table->integer('file_size')->nullable();
            $table->integer('buyCount')->nullable();
            $table->integer('price');
            $table->text('attachment')->nullable();
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
        Schema::dropIfExists('products');
    }
}

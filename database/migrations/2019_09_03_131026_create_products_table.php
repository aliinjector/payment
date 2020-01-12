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
            $table->bigIncrements('id')->unsigned();
            $table->unsignedInteger('shop_id');
            $table->string('title');
            $table->string('slug');
            $table->bigInteger('productCat_id')->unsigned()->index();
            $table->bigInteger('brand_id')->unsigned()->index()->nullable();
            $table->unsignedInteger('status')->default(1);
            $table->enum('fast_sending',['on', 'off'])->default('off');
            $table->enum('money_back',['on', 'off'])->default('off');
            $table->enum('support',['on', 'off'])->default('off');
            $table->enum('secure_payment',['on', 'off'])->default('off');
            $table->string('type');
            $table->text('description');
            $table->text('image')->nullable();
            $table->text('color')->nullable();
            $table->integer('viewCount')->default(0);
            $table->integer('amount')->default(0)->nullable();
            $table->integer('min_amount')->default(0)->nullable();
            $table->string('measure')->nullable();
            $table->integer('refund')->default(0);
            $table->integer('weight')->nullable();
            $table->integer('file_size')->nullable();
            $table->integer('buyCount')->default(0);
            $table->integer('price');
            $table->integer('off_price')->nullable();
            $table->text('attachment')->nullable();
            $table->timestamps();
            $table->softDeletes();



            $table->foreign('productCat_id')->references('id')->on('product_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
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

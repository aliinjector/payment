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
            $table->bigInteger('productCat_id')->unsigned()->index();
            $table->unsignedInteger('status')->default(0);
            $table->unsignedInteger('fast_sending')->default(0);
            $table->unsignedInteger('money_back')->default(0);
            $table->unsignedInteger('support')->default(0);
            $table->unsignedInteger('secure_payment')->default(0);
            $table->string('type');
            $table->text('description');
            $table->text('image')->nullable();
            $table->text('color_1')->nullable();
            $table->text('color_2')->nullable();
            $table->text('color_3')->nullable();
            $table->text('color_4')->nullable();
            $table->text('color_5')->nullable();
            $table->text('feature_1')->nullable();
            $table->text('feature_2')->nullable();
            $table->text('feature_3')->nullable();
            $table->text('feature_4')->nullable();
            $table->integer('viewCount')->default(0);
            $table->integer('amount')->default(0)->nullable();
            $table->integer('refund')->default(0);
            $table->integer('weight')->nullable();
            $table->integer('file_size')->nullable();
            $table->integer('buyCount')->default(0);
            $table->integer('price');
            $table->text('attachment')->nullable();
            $table->timestamps();
            $table->softDeletes();



            $table->foreign('productCat_id')->references('id')->on('product_categories')->onDelete('cascade')->onUpdate('cascade');
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

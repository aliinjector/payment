<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->text('name');
            $table->text('icon')->nullable();
            $table->bigInteger('productCat_id')->unsigned()->index();
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
        Schema::dropIfExists('features');
    }
}

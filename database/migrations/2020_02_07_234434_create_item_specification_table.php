<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemSpecificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_specification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('price')->nullable();
            $table->bigInteger('specification_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();




            $table->foreign('specification_id')->references('id')->on('specifications')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_specification');
    }
}

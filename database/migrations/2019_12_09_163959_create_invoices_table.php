<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('shop_id')->unsigned()->index();
          $table->enum('sign',['on'])->nullable();
          $table->enum('logo',['on'])->nullable();
          $table->enum('date',['on'])->nullable();
          $table->enum('number',['on'])->nullable();
          $table->enum('custome_info',['on'])->nullable();
          $table->enum('seller_info',['on'])->nullable();
          $table->enum('approved',['on'])->nullable();
          $table->enum('address',['on'])->nullable();
          $table->enum('tel',['on'])->nullable();
          $table->enum('email',['on'])->nullable();
          $table->enum('economicـcode',['on'])->nullable();
          $table->text('economicـcode_number')->nullable();
          $table->enum('registrationـnumber',['on'])->nullable();
          $table->text('registrationـnumber‌_number')->nullable();
          $table->enum('zip_code',['on'])->nullable();
          $table->enum('vat',['on'])->nullable();
          $table->enum('description_status',['on'])->nullable();
          $table->text('description')->nullable();
          $table->enum('motto',['on'])->nullable();
          $table->text('motto_text')->nullable();
          $table->timestamps();
          $table->softDeletes();



          $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}

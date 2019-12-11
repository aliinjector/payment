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
          $table->enum('sign',['enable', 'disable'])->nullable();
          $table->enum('logo',['enable', 'disable'])->nullable();
          $table->enum('date',['enable', 'disable'])->nullable();
          $table->enum('number',['enable', 'disable'])->nullable();
          $table->enum('custom_info',['enable', 'disable'])->nullable();
          $table->enum('seller_info',['enable', 'disable'])->nullable();
          $table->enum('approved',['enable', 'disable'])->nullable();
          $table->enum('address',['enable', 'disable'])->nullable();
          $table->enum('tel',['enable', 'disable'])->nullable();
          $table->enum('email',['enable', 'disable'])->nullable();
          $table->enum('economic_code',['enable', 'disable'])->nullable();
          $table->text('economic_code_number')->default(0);
          $table->enum('registration_number',['enable', 'disable'])->nullable();
          $table->text('registration_number‌_number')->default(0);
          $table->enum('vat',['enable', 'disable'])->nullable();
          $table->enum('description_status',['enable', 'disable'])->nullable();
          $table->text('description')->default('توضیحات');
          $table->enum('motto',['enable', 'disable'])->nullable();
          $table->text('motto_text')->default('شعار');
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

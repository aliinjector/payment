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
          $table->enum('sign',['enable', 'disable'])->default('disable');
          $table->enum('logo',['enable', 'disable'])->default('disable');
          $table->enum('date',['enable', 'disable'])->default('disable');
          $table->enum('number',['enable', 'disable'])->default('disable');
          $table->enum('custom_info',['enable', 'disable'])->default('disable');
          $table->enum('seller_info',['enable', 'disable'])->default('disable');
          $table->enum('address',['enable', 'disable'])->default('disable');
          $table->enum('tel',['enable', 'disable'])->default('disable');
          $table->enum('email',['enable', 'disable'])->default('disable');
          $table->enum('economic_code',['enable', 'disable'])->default('disable');
          $table->text('economic_code_number')->default(0);
          $table->enum('registration_number',['enable', 'disable'])->default('disable');
          $table->text('registration_number‌_number')->default(0);
          $table->enum('vat',['enable', 'disable'])->default('disable');
          $table->enum('description_status',['enable', 'disable'])->default('disable');
          $table->text('description')->default('توضیحات');
          $table->enum('motto',['enable', 'disable'])->default('disable');
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

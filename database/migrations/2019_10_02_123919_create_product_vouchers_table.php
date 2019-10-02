<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('shop_id');
            $table->unsignedInteger('voucher_id');
            $table->unsignedInteger('product_id');
            $table->timestamps();
            $table->softDeletes( );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_vouchers');
    }
}

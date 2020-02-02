<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('shop_id');
            $table->unsignedInteger('product_id')->nullable();
            $table->string('code');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('uses')->nullable();
            $table->integer('discount_amount');
            $table->boolean('is_fixed')->default(true);
            $table->unsignedInteger('status')->default(1);
            $table->text('users')->nullable();
            $table->enum('first_purchase',['enable', 'disable'])->default('disable');
            $table->enum('type',['number', 'percentage'])->default('number');
            $table->enum('disposable',['enable', 'disable'])->default('disable');
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();
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
        Schema::dropIfExists('vouchers');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('english_name')->unique();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('cat_id')->nullable();
            $table->unsignedInteger('contact_id')->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->enum('quick_way',['enable', 'disable'])->default('disable');
            $table->enum('posting_way',['enable', 'disable'])->default('disable');
            $table->enum('person_way',['enable', 'disable'])->default('disable');
            $table->string('icon')->nullable();
            $table->string('logo')->nullable();
            $table->string('description');
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
        Schema::dropIfExists('shops');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('fatherName')->nullable();
            $table->string('tel')->nullable();
            $table->string('city')->nullable();
            $table->string('nationalCode')->nullable();
            $table->string('shenasnamehCode')->nullable();
            $table->string('placeOfIssue')->nullable();
            $table->string('birthDate')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('shenasnamehPic')->nullable();
            $table->string('melliCardPic')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_information');
    }
}

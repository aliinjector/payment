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
            $table->string('fatherName');
            $table->string('tel');
            $table->string('city');
            $table->string('address');
            $table->string('nationalCode');
            $table->string('shenasnamehCode');
            $table->string('placeOfIssue');
            $table->string('birthDate');
            $table->string('zipCode');
            $table->string('shenasnamehPic');
            $table->string('melliCardPic');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('user_information');
    }
}

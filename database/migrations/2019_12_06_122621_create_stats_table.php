<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('shop_id');
            $table->string('url');
            $table->string('osName');
            $table->string('osVersion');
            $table->string('browserName');
            $table->string('browserVersion');
            $table->string('userAgent');
            $table->string('dateTime');
            $table->string('day');
            $table->string('ip');
            $table->string('wh');
            $table->string('timestamp');
            $table->string('ref');
            $table->string('searchEngine');
            $table->string('device');
            $table->string('country');
            $table->string('countryCode');
            $table->string('city');
            $table->string('isp');
            $table->string('weekDay');
            $table->string('hour');
            $table->string('page');
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
        Schema::dropIfExists('stats');
    }
}

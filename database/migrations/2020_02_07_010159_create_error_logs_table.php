<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateErrorLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('massage')->nullable();
            $table->text('controller')->nullable();
            $table->text('route')->nullable();
            $table->text('method')->nullable();
            $table->text('userAgent')->nullable();
            $table->text('userIp')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->enum('status',['not_start', 'in_progress', 'complete'])->default('not_start');
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
        Schema::dropIfExists('error_logs');
    }
}

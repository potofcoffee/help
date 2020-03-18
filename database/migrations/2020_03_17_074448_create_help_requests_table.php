<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('city_id');
            $table->integer('user_id')->nullable();
            $table->text('name');
            $table->text('address');
            $table->text('zip');
            $table->text('city');
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('threema')->nullable();
            $table->text('request');
            $table->text('notes')->nullable();
            $table->integer('done')->default(0);
            $table->timestamps();
        });
        Schema::create('helper_help_request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('helper_id');
            $table->integer('help_request_id');
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
        Schema::dropIfExists('help_requests');
        Schema::dropIfExists('helper_help_request');
    }
}

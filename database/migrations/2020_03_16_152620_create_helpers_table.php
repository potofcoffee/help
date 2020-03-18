<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helpers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('address');
            $table->text('zip');
            $table->text('city');
            $table->text('phone');
            $table->text('email');
            $table->text('threema');
            $table->text('notes');
            $table->timestamps();
        });

        Schema::create('city_helper', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('city_id');
            $table->integer('helper_id');
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
        Schema::dropIfExists('helpers');
        Schema::dropIfExists('city_helper');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoordinates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('helpers', function (Blueprint $table){
            $table->string('lat')->nullable()->default('');
            $table->string('lon')->nullable()->default('');
        });
        Schema::table('help_requests', function (Blueprint $table){
            $table->string('lat')->nullable()->default('');
            $table->string('lon')->nullable()->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('helpers', function (Blueprint $table){
            $table->dropColumn('lat');
            $table->dropColumn('lon');
        });
        Schema::table('help_requests', function (Blueprint $table){
            $table->dropColumn('lat');
            $table->dropColumn('lon');
        });
    }
}

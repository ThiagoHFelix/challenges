<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('monster_id');
            $table->decimal('latitude',20,8,true);
            $table->decimal('longitude',20,8,true); 
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('threat_levels');
            $table->foreign('monster_id')->references('id')->on('monsters');
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
        Schema::dropIfExists('threats');
    }
}

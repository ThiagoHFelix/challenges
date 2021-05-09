<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name','50')->unique();
            $table->decimal('latitude',20,8,true)->default(null);
            $table->decimal('longitude',20,8,true)->default(null);
            $table->unsignedBigInteger('ranking_id');
            $table->foreign('ranking_id')->references('id')->on('rankings');
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
        Schema::dropIfExists('heroes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hero_id');
            $table->unsignedBigInteger('threat_id');
            $table->unsignedBigInteger('status_id');
            $table->foreign('hero_id')->references('id')->on('heroes');
            $table->foreign('threat_id')->references('id')->on('threats');
            $table->foreign('status_id')->references('id')->on('status');
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
        Schema::dropIfExists('allocations');
    }
}

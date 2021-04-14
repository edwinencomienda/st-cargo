<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmparcelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmparcel', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('agrarian', 5);
            $table->string('location',55);
            $table->double('hectare', 8,5);
            $table->string('ownership');
            $table->string('owner',55);
            $table->string('otherown', 55);
            $table->string('tenant', 55);
            $table->string('lesse', 55);

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
        Schema::dropIfExists('farmparcel');
    }
}

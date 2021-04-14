<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerparttwoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmerparttwo', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('livelihood',50);
            $table->string('farmactivity',50);
            $table->string('othercrop',50);
            $table->string('livestock',50);
            $table->string('poultry',50);
            $table->string('kindwork',50);
            $table->string('otherwork',50);
            $table->string('fishwork',50);
            $table->string('otherfish',50);
            $table->double('farmgross');
            $table->double('nonfarmgrass');
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
        Schema::dropIfExists('farmerparttwo');
    }
}

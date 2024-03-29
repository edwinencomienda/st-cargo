<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropinventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cropinventory', function (Blueprint $table) {
            $table->id();
            $table->integer('crop_program')->nullable();
            $table->string('crop_product')->nullable();
            $table->integer('qty')->nullable();
            $table->string('admin')->nullable();
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
        Schema::dropIfExists('cropinventory');
    }
}

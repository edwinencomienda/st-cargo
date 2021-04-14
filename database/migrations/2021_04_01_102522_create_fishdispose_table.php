<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishdisposeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fishdispose', function (Blueprint $table) {
            $table->id();
            
            $table->string('farmer')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->string('programs')->nullable();
            $table->string('products')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('rendered')->nullable();
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
        Schema::dropIfExists('fishdispose');
    }
}

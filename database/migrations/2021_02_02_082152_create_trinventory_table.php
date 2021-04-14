<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrinventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trinventory', function (Blueprint $table) {
            $table->id();
            $table->integer('service_type')->nullable();
            $table->string('tractor_name')->nullable();
            $table->integer('tractor_model')->nullable();
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
        Schema::dropIfExists('trinventory');
    }
}

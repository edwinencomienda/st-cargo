<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTractorrequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tractorrequest', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->integer('tractor_service');
            $table->string('brgylocation');
            $table->double('payamount', 8,2);
            $table->float('hectare', 5,2);
            $table->string('approvedby')->nullable();
            $table->timestamps();
            $table->date('delivery_date')->nullable();
            $table->string('approved', 20)->nullable();
            $table->string('status',20)->nullable();

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tractorrequest');
    }


}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelanimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelanimal', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 111);
            $table->integer('parcel');
            $table->string('animal', 55);
            $table->double('size', 8,5);
            $table->integer('heads');
            $table->string('farmtype',55);
            $table->string('organi',3);

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
        Schema::dropIfExists('parcelanimal');
    }
}

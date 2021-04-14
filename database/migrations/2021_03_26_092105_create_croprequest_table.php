<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCroprequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('croprequest', function (Blueprint $table) {
            $table->id();
            $table->string('farmer',155);
            $table->integer('program')->nullable();
            $table->integer('products');
            $table->integer('quantity');
            $table->string('approved',155);
            $table->string('status',35);

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
        Schema::dropIfExists('croprequest');
    }
}

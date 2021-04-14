<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivestockinventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livestockinventory', function (Blueprint $table) {
            $table->id();

            $table->integer('program')->nullable();
            $table->string('product')->nullable();
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
        Schema::dropIfExists('livestockinventory');
    }
}

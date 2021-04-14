<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticenbillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticenbills', function (Blueprint $table) {
            $table->id();
            $table->string('farmer')->nullable();
            $table->string('admin')->nullable();
            $table->string('requestrole')->nullable();
            $table->string('noticeid')->nullable();
            $table->string('approved')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('noticenbills');
    }
}

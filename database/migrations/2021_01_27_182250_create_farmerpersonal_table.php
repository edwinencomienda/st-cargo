<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerpersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmerpersonal', function (Blueprint $table) {
            $table->id();

            $table->string('uuid');
            $table->string('education',25)->nullable();
            $table->string('pwd',5)->nullable();
            $table->string('porpis',5)->nullable();
            $table->string('aypis',5)->nullable();
            $table->string('ayp_detail',50)->nullable();

            $table->string('religion',50)->nullable();
            $table->string('status',25)->nullable();
            $table->string('spouse',50)->nullable();
            $table->string('mother',50)->nullable();

            $table->string('gov_id',5)->nullable();
            $table->string('gov_detail',50)->nullable();
            $table->string('househead',5)->nullable();
            $table->string('nohousehead',50)->nullable();
            $table->string('householdrel',50)->nullable();

            // $table->integer('noofmem',6)->nullable();
            // $table->integer('maleno',6)->nullable();
            // $table->integer('femaleno',6)->nullable();
            $table->integer('noofmen')->nullable();
            $table->integer('maleno')->nullable();
            $table->integer('femaleno')->nullable();


            $table->string('coop',5)->nullable();
            $table->string('coopdetail',50)->nullable();
            $table->string('emergency',50)->nullable();
            $table->string('contactno',25)->nullable();

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
        Schema::dropIfExists('farmerpersonal');
    }
}

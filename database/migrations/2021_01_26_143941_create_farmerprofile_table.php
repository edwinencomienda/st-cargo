<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerprofileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmerprofile', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('idpicture');
            $table->string('lname',50);
            $table->string('fname',50);
            $table->string('mname',50);
            $table->string('exname',50);
            $table->string('gender',20);
            $table->string('houseno',50);
            $table->string('street',50);
            $table->string('brgy',40);
            $table->string('city',30);
            $table->string('province',20);
            $table->string('contact',20);
            $table->date('birthdate');
            $table->string('birthplace',70);
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
        Schema::dropIfExists('farmerprofile');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanrequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loanrequest', function (Blueprint $table) {
            $table->id();
            $table->string('farmer',155);
            $table->integer('role');
            $table->double('amount', 55,2);
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
        Schema::dropIfExists('loanrequest');
    }
}

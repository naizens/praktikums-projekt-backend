<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string("userName", 64)->unique();
            $table->string("eMail")->unique();
            $table->string("password");
            $table->string("session")->nullable();
            $table->string("firstName");
            $table->string("lastName");
            $table->date("birthDate");
            $table->string("department");
            $table->integer("maxAmountOfHolidays");
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
        Schema::dropIfExists('people');
    }
}

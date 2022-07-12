<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_holidays', function (Blueprint $table) {
            $table->id();
            $table->foreignId("person_id")->constrained()->cascadeOnDelete();
            $table->date("start");
            $table->date("end");
            $table->string("type");
            $table->string("daytime")->nullable();
            $table->string("status")->default("registered");
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
        Schema::dropIfExists('person_holidays');
    }
}

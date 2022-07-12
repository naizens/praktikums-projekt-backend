<?php

use App\Models\Person;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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

        (new Person([
            "userName"              => 'admin',
            "eMail"                 => 'admin@localhost',
            "password"              => Hash::make('12345'),
            "firstName"             => 'Admin',
            "lastName"              => 'Admin',
            "birthDate"             => '1970-01-01',
            "department"            => 'admin',
            "maxAmountOfHolidays"   => 28
        ]))->save();
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

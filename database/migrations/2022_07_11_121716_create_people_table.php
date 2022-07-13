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
            "eMail"                 => 'heide@netzfactor.de',
            "password"              => Hash::make('1234'),
            "firstName"             => 'Niclas',
            "lastName"              => 'Heide',
            "birthDate"             => '2000-29-09',
            "department"            => 'web',
            "maxAmountOfHolidays"   => 28
        ]))->save();
        (new Person([
            "userName"              => 'test',
            "eMail"                 => 'test@test.com',
            "password"              => Hash::make('1234'),
            "firstName"             => 'Test',
            "lastName"              => 'Name',
            "birthDate"             => '2000-29-09',
            "department"            => 'media',
            "maxAmountOfHolidays"   => 30
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

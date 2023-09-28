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
            $table->boolean("admin")->default(false);
            $table->integer("maxAmountOfHolidays");
            $table->integer("holidaysOfPreviousYear")->nullable()->default(0);
            $table->integer("restHolidays")->nullable();
            $table->timestamps();
        });

        (new Person([
            "userName"              => 'admin',
            "eMail"                 => 'admin@admin.de',
            "password"              => Hash::make('1234'),
            "firstName"             => 'Niclas',
            "lastName"              => 'HEide',
            "birthDate"             => '1984-01-05',
            "department"            => 'nf',
            "maxAmountOfHolidays"   => 28,
            "admin"                 => true,

        ]))->save();
    }

    /**S
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}

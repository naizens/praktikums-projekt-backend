<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Person extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "username",
        "eMail",
        "password",
        "firstName",
        "lastName",
        "birthDate",
        "department",
        "maxAmountOfHolidays"
    ];
    protected $dates = [
        "birthDate"
    ];
    protected $casts = [
        "birthDate" => "date:Y-m-d",
    ];

    public function holidays()
    {
        return $this->hasMany(PersonHoliday::class);
    }
    public function setPassword(string $value){
        $this->attributes["password"] = Hash::make($value);
    }
}

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
        "userName",
        "eMail",
        "password",
        "firstName",
        "lastName",
        "birthDate",
        "department",
        "maxAmountOfHolidays",
        "canManageHolidays",
    ];
    protected $dates = [
        "birthDate"
    ];
    protected $casts = [
        "birthDate" => "date:Y-m-d",
        "canManageHolidays" => "boolean"
    ];

    public function holidays()
    {
        return $this->hasMany(PersonHoliday::class);
    }
    public function setPassword(string $value){
        $this->attributes["password"] = Hash::make($value);
    }
    public function checkPassword(string $password){
        return Hash::check($password, $this->password);
    }
}

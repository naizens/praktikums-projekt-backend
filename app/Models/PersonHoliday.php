<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonHoliday extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "start",
        "end",
        "type",
        "daytime",
        "status",
    ];

    protected $dates = [
        "start",
        "end",
    ];
    protected $casts = [
        "start" => "date:Y-m-d",
        "end" => "date:Y-m-d",
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}

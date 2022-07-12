<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\PersonHoliday;

class PersonController extends Controller
{
    public function index(){
        return response()->json(Person::with(["holidays"])->get());
    }
    public function submit(\Illuminate\Http\Request $request){
        $inputs = $request->all();
        $holiday = new PersonHoliday([
            "start"=>$inputs["startDate"],
            "end"=>$inputs["endDate"],
            "type"=>$inputs["holidaytype"],
            "daytime"=>$inputs["daytime"]
        ]);
        $holiday->save();
        return redirect("/kalender");
    }
}
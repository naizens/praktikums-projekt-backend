<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\PersonHoliday;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function index(){
        return response()->json(PersonHoliday::where("person_id", Auth::user()->id)->get());
    }
    public function render(){
        return view("index", [
            "user"=>Auth::user(),
            "holidays"=>PersonHoliday::where("person_id", Auth::user()->id)->get(),
            "allHolidays"=>PersonHoliday::with("person")->get(),
        ]);
    }

    public function submit(\Illuminate\Http\Request $request){
        $inputs = $request->all();
        $holiday = new PersonHoliday([
            "person_id"=>Auth::user()->id,
            "start"=>$inputs["startDate"],
            "end"=>$inputs["endDate"],
            "type"=>$inputs["holidaytype"],
            "daytime"=>$inputs["daytime"] ?? null
        ]);
        $holiday->save();
        return redirect("/kalender");
    }
}
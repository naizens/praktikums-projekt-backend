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

    public function renderMain(){
        return view("/layers/base", [
            "user" => Auth::user()
        ]);
    }
    public function renderDashboard(){
        return view("templates/dashboard", [
            "user" => Auth::user()
        ]);
    }
    public function renderCalendar(){
        return view("templates/calendar", [
            "user" => Auth::user(),
            "holidays"=>PersonHoliday::where("person_id", Auth::user()->id)->get(),
            "allHolidays"=>PersonHoliday::with("person")->get(),
        ]);
    }
    public function renderProfile(){
        return view("templates/profile", [
            "user" => Auth::user()
        ]);
    }
    public function renderEmployees(){
        return view("templates/employees", [
            "user" => Auth::user()
        ]);
    }
    public function renderVacations(){
        return view("templates/holidayAdministration", [
            "user" => Auth::user(),
            "allHolidays"=>PersonHoliday::with("person")->get()
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
        return redirect("/calendar");
    }

    public function acceptVacation(\Illuminate\Http\Request $request){
        $inputs = $request->all();
        $holiday = PersonHoliday::find($inputs["holidayID"]);
        $holiday->status = "accepted";
        $holiday->save();
        return redirect("/vacations");
    }
    public function declineVacation(\Illuminate\Http\Request $request){
        $inputs = $request->all();
        $holiday = PersonHoliday::find($inputs["holidayID"]);
        $holiday->delete();
        return redirect("/vacations");
    }
}

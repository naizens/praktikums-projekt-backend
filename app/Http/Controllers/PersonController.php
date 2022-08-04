<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\PersonHoliday;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{
    public function index(){
        return response()->json(PersonHoliday::where("person_id", Auth::user()->id)->get());
    }

    public function renderMain(){
        return view("/layers/base", [
            "user"              => Auth::user()
        ]);
    }
    public function renderDashboard(){
        return view("templates/dashboard", [
            "user"              => Auth::user()
        ]);
    }
    public function renderCalendar(){
        return view("templates/calendar", [
            "user"              => Auth::user(),
            "holidays"          =>PersonHoliday::where("person_id", Auth::user()->id)->get(),
            "allHolidays"       =>PersonHoliday::with("person")->get(),
            "allPersons"        => Person::all()
        ]);
    }
    public function renderProfile(){
        return view("templates/profile", [
            "user"              => Auth::user()
        ]);
    }
    public function renderManageEmployees(Request $request){
        if(! $request->user()->admin){
            return response(view("errors.4xx", [
                "status"        =>  403,
                "statusText"    => "Nicht Autorisiert.",
                "extraText"     => "Du hast keinen Zugriff, da du nicht die benötigten Rechte hast."
            ]), 403);
        }

        return view("templates/manageEmployees", [
            "user"              => Auth::user(),
            "allPersons"        => Person::all()
        ]);
    }
    public function renderEmployees(){
        return view("templates/employees", [
            "user"              => Auth::user(),
            "allPersons"        => Person::all(),
            "allHolidays"       =>PersonHoliday::with("person")->get()
        ]);
    }
    public function renderVacations(Request $request){
        if(! $request->user()->admin){
            return response(view("errors.4xx", [
                "status"        =>  403,
                "statusText"    => "Nicht Autorisiert.",
                "extraText"     => "Du hast keinen Zugriff, da du nicht die benötigten Rechte hast."
            ]), 403);
        }
        return view("templates/holidayAdministration", [
            "user" => Auth::user(),
            "allHolidays"=>PersonHoliday::with("person")->get()
        ]);
    }

    public function submitUser(\Illuminate\Http\Request $request){
        if(! $request->user()->admin){
            return response(view("errors.4xx", [
                "status"        =>  403,
                "statusText"    => "Nicht Autorisiert.",
                "extraText"     => "Du hast keinen Zugriff, da du nicht die benötigten Rechte hast."
            ]), 403);
        }
        $inputs = $request->all();
        $department = null;
        $inputs["department"] = intval($inputs["department"]);
        if($inputs["department"] === 1){
            $department = "web";
        } else if($inputs["department"] === 2){
            $department = "app";
        } else if($inputs["department"] === 3){
            $department = "network";
        } else if($inputs["department"] === 4){
            $department = "media";
        }

        $person = new Person([
            "userName"              => $inputs["userName"],
            "eMail"                 => $inputs["eMail"],
            "password"              => Hash::make($inputs["password"]),
            "firstName"             => $inputs["firstName"],
            "lastName"              => $inputs["lastName"],
            "birthDate"             => $inputs["birthDate"],
            "department"            => $department,
            "maxAmountOfHolidays"   => $inputs["maxAmountOfHolidays"],


        ]);
        $person->save();
        return redirect("/manageEmployees");
    }

    public function submit(\Illuminate\Http\Request $request){
        $inputs = $request->all();
        $holiday = new PersonHoliday([
            "person_id"         =>Auth::user()->id,
            "start"             =>$inputs["startDate"],
            "end"               =>$inputs["endDate"],
            "type"              =>$inputs["holidaytype"],
            "daytime"           =>$inputs["daytime"] ?? null
        ]);
        $holiday->save();
        return redirect("/calendar");
    }

    public function getRestDays(\Illuminate\Http\Request $request) {
        $inputs = $request->all();
        $user = Person::find($inputs["userId"]);
        $user->restHolidays = $inputs["restDays"];
        $user->save();
        return redirect("/calendar");

    }

    public function acceptVacation(\Illuminate\Http\Request $request){
        if(! $request->user()->admin){
            return response(view("errors.4xx", [
                "status"        =>  403,
                "statusText"    => "Nicht Autorisiert.",
                "extraText"     => "Du hast keinen Zugriff, da du nicht die benötigten Rechte hast."
            ]), 403);;
        }
        $inputs = $request->all();
        $holiday = PersonHoliday::find($inputs["holidayID"]);
        $holiday->status = "accepted";
        $holiday->save();
        return redirect("/vacations");
    }
    public function declineVacation(\Illuminate\Http\Request $request){
        if(! $request->user()->admin){
            return response(view("errors.4xx", [
                "status"        =>  403,
                "statusText"    => "Nicht Autorisiert.",
                "extraText"     => "Du hast keinen Zugriff, da du nicht die benötigten Rechte hast."
            ]), 403);
        }
        $inputs = $request->all();
        $holiday = PersonHoliday::find($inputs["holidayID"]);
        $holiday->delete();
        return redirect("/vacations");
    }
}

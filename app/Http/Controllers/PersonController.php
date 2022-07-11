<?php

namespace App\Http\Controllers;

use App\Models\Person;

class PersonController extends Controller
{
    public function index(){
        return response()->json((Person::all()));
    }
}
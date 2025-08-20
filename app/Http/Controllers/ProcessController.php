<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\DataSchool;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()  {
        $students6 = DataSchool::where("semester", "6")->get();
        $students11 = DataSchool::where("semester", "11")->get(); 

        return view("admin.process.index", [
            "students11" => $students11,
            "students6" => $students6,
        ]);
    }
}

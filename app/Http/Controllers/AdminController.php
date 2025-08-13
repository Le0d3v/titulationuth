<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Process;
use App\Models\DataSchool;
use Illuminate\Http\Request;
use Database\Factories\ProcessesFactory;

class AdminController extends Controller
{
    public function index() {
        $six = DataSchool::where("semester", "6")->get();
        $eleven = DataSchool::where("semester", "11")->get(); 
        $admins = User::where("rol", 1)->get();
        $students = User::where("rol", 0)->get();
        $processes = Process::all();
        
        
        return view("dashboard",[
            "six" => $six,
            "eleven" => $eleven,
            "admins" => $admins,
            "students" => $students
        ]);
    }
}

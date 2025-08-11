<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataSchool;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        // $user = User::factory()->count(600)->create();
        $data = DataSchool::factory()->count(195)->create();
        $users = User::where("rol", 0)->get();
        return view("admin.students.index", [
            "users" => $users
        ]);
    }
}

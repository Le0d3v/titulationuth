<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataSchool;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $users = User::where("rol", 0)->get();
        $dataUsers = DataSchool::where("semester", 6)->get();
        return view("admin.students.index", [
            "users" => $users,
            "dataUsers" => $dataUsers
        ]);
    }
    
    public function showEngeniers() {
        $users = User::where("rol", 0)->get();
        $dataUsers = DataSchool::where("semester", 11)->get();
        return view("admin.students.enginers", [
            "users" => $users,
            "dataUsers" => $dataUsers
        ]);
    }

    public function showData($id)
    {
        $data = DataSchool::were("id", $id);
        return response()->json($data);
    }
}

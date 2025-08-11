<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataSchool;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $users = User::where("rol", 0)->get();
        $dataUsers = DataSchool::all();
        return view("admin.students.index", [
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

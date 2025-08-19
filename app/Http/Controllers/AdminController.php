<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Process;
use App\Models\DataSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Database\Factories\ProcessesFactory;
use Database\Factories\DataSchoolFactory;

class AdminController extends Controller
{
    public function index() {
        // Procesos de 6to
        $procesos6 = Process::whereHas('dataSchool', function($q) {
            $q->where('semester', 6);
        })->get();
        $procesos6completados = $procesos6->where("success", 1)->values()->toArray();
        $procesos6pendientes = $procesos6->where("success", 0)->values()->toArray();

        // Procesos de 11vo
        $procesos11 = Process::whereHas('dataSchool', function($q) {
            $q->where('semester', 11);
        })->get();
        $procesos11completados = $procesos11->where("success", 1)->values()->toArray();
        $procesos11pendientes = $procesos11->where("success", 0)->values()->toArray();

        // Datos adicionales para el dashboard
        $six = DataSchool::where("semester", "6")->get();
        $eleven = DataSchool::where("semester", "11")->get(); 
        $admins = User::where("rol", 1)->get();
        $students = User::where("rol", 0)->get();
        
        $processes = Process::all();
        
        return view("dashboard",[
            "six" => $six,
            "eleven" => $eleven,
            "admins" => $admins,
            "students" => $students,
            "procesos6" => $procesos6,
            "procesos11" => $procesos11,
            'procesos6completados' => $procesos6completados,
            'procesos6pendientes'  => $procesos6pendientes,
            'procesos11completados'=> $procesos11completados,
            'procesos11pendientes' => $procesos11pendientes
        ]);
    }

    public function showStudent($id) {
        $data_user = DataSchool::where("user_id", $id)->get();

        return view("admin.students.student", [
            "data" => $data_user[0],
        ]);
    }
}

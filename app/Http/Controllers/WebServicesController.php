<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Process;
use App\Models\DataSchool;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Storage;

class WebServicesController extends Controller
{
    public function getStudents() {
        $students = User::where("rol", 0)->get();
        return $students->toJson();
    }

    public function getStudent($id) {
        $students = User::find($id);
        return $students->toJson();
    }
    public function getDataSchools() {
        $data = DataSchool::all();
        return $data->toJson();
    }
    public function getDataSchool($id) {
        $data = DataSchool::find($id);
        return $data->toJson();
    }
    public function getProcesses() {
        $processes = Process::all();
        return $processes->toJson();
    }
    public function getProcess($id) {
        $processes = Process::find($id);
        return $processes->toJson();
    }

    public function getPDF($id) {
        $process = Process::find($id);
        $url = Storage::url("app/public/pdfs/" . $process->image_donation_url);
        return response()->json(['url' => $url], 200);
    }
}

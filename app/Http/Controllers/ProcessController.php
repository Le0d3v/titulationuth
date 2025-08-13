<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()  {
        $processes = Process::all();
        return view("admin.process.index", [
            "processes" => $processes
        ]);
    }
}

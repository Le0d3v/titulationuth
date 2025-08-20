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

    public function show($id) {
        $data = DataSchool::where("process_id", $id)->get();
        return view("admin.process.show", [
            "data" => $data[0],
        ]);
    }

    public function aceptImage($id) {
        $data = DataSchool::where("process_id", $id)->get();
        $data[0]->process->images_upload = 1;
        $data[0]->process->save();

        return back();
    }
    
    public function rejectImage($id) {
        $data = DataSchool::where("process_id", $id)->get();
        $data[0]->process->images_upload = 3;
        $data[0]->process->save();

        return back();
    }

    public function comentImage(Request $request) { 
        $data = DataSchool::where("process_id", $request->id)->get();

        $request->validate([
            "image_coment" => "required|string"
        ]);

        $data[0]->process->image_coments = $request->image_coment;
        $data[0]->process->save();

        return back();
    }
    public function aceptDonation($id) {
        $data = DataSchool::where("process_id", $id)->get();
        $data[0]->process->donation_payment = 1;
        $data[0]->process->save();

        return back();
    }
    
    public function rejectDonation($id) {
        $data = DataSchool::where("process_id", $id)->get();
        $data[0]->process->donation_payment = 3;
        $data[0]->process->save();

        return back();
    }

    public function comentDonation(Request $request) { 
        $data = DataSchool::where("process_id", $request->id)->get();

        $request->validate([
            "donation_coment" => "required|string"
        ]);

        $data[0]->process->donation_coments = $request->donation_coment;
        $data[0]->process->save();

        return back();
    }
}


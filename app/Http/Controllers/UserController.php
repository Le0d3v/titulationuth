<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Process;
use App\Models\DataSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home() {
        $user = Auth::user();
        $data_user = DataSchool::where("user_id", operator: $user->id)->get();

        $process["data_validation"] = $data_user[0]->process->data_validation;
        $process["images_upload"] = $data_user[0]->process->images_upload;
        $process["donation_payment"] = $data_user[0]->process->donation_payment;
        $process["tittle_payment"] = $data_user[0]->process->tittle_payment;

        $progress = $data_user[0]->process->getProgressPercentage($process);
        $completes = $data_user[0]->process->getCompletedProcesses();
        $incompletes = $data_user[0]->process->getIncompletedProcesses();

        return view("user.home", [
            "user" => $user,
            "data_user" => $data_user,
            "progress" => (int) $progress,
            "completes" => $completes,
            "incompletes" => $incompletes
        ]);
    }

    public function myProcess() {
        $user = Auth::user();
        $data_user = DataSchool::where("user_id", operator: $user->id)->get();
        $completed_process = $data_user[0]->process->getCompletedProcesses();
        $incompleted_process = $data_user[0]->process->getIncompletedProcesses();

        $process["data_validation"] = $data_user[0]->process->data_validation;
        $process["images_upload"] = $data_user[0]->process->images_upload;
        $process["donation_payment"] = $data_user[0]->process->donation_payment;
        $process["tittle_payment"] = $data_user[0]->process->tittle_payment;

        $progress = $data_user[0]->process->getProgressPercentage($process);

        return view("user.process.index", [
            "user" => $user,
            "data_user" => $data_user[0],
            "completed_process" => $completed_process,
            "incompleted_process" => $incompleted_process,
            "progress" => $progress,
        ]);
    }

    public function dataValidation() {
        $data_user = DataSchool::where("user_id", Auth::user()->id)->get();
        return view("user.process.data_validation", [
            "data" => $data_user[0],
        ]);
    }

    public function dataValidationStore(Request $request) {
        $request->validate([
            "name" => "required",
            "curp" => "required",
            "rfc" => "required",
            "born_date" => "required",
            "gener" => "required",
            "civil_state" => "required",
            "telephone" => "required",
            "email" => "required",
        ]);

        $user = User::find(Auth::user());
        $dataSchool = DataSchool::where("user_id", Auth::user()->id)->get();
        $process = Process::where("id", $dataSchool[0]->process_id)->get();

        
        $user[0]->name = $request->name;
        $user[0]->curp = $request->curp;
        $user[0]->rfc = $request->rfc;
        $user[0]->born_date = $request->born_date;
        $user[0]->gener = $request->gener;
        $user[0]->civil_state = $request->civil_state;
        $user[0]->telephone = $request->telephone;
        $user[0]->email = $request->civil_state;
        
        $process[0]->data_validation = 1;

        $user[0]->save();
        $process[0]->save();

        return redirect()->intended('my-process');
    }
}
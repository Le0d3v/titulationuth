<?php

namespace App\Http\Controllers;

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

        return view("user.home", [
            "user" => $user,
            "data_user" => $data_user,
            "progress" => (int) $progress
        ]);
    }
}

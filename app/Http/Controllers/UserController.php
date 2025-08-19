<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Process;
use App\Models\DataSchool;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

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
        $user[0]->email = $request->email;
        
        $process[0]->data_validation = 1;

        $user[0]->save();
        $process[0]->save();

        return redirect()->intended('my-process');
    }

    public function myFiles() {
        $data = DataSchool::where("user_id", Auth::user()->id)->get();
        return view("user.process.files", [
            "data" => $data[0]
        ]);
    }

    public function imageStore(Request $request) {
        $dataSchool = DataSchool::where("user_id", Auth::user()->id)->get();
        $process = Process::where("id", $dataSchool[0]->process_id)->get();

        // Leer la imágen desde el request
        $imagen = $request->file("image_titulation_url");

        $nombreImagen = Str::uuid() . "." . $imagen->extension(); // Crear un nombre unico para las imagenes

        $path = public_path("/img/uploads/pictures/" . $nombreImagen);

        $manager = new ImageManager(new Driver);

        $img = $manager->read($imagen);

        $img->resize(1000, 1000);

        $img->save($path);

        $process[0]->images_upload = 2;
        $process[0]->image_titulation_url = $nombreImagen;
        $process[0]->save();


        //Contruir una respuesta pra dropzone
        return redirect()->intended('my-files');
    }

    public function imageDonationStore(Request $request) {
        $dataSchool = DataSchool::where("user_id", Auth::user()->id)->get();
        $process = Process::where("id", $dataSchool[0]->process_id)->get();

        // Leer la imágen desde el request
        $imagen = $request->file("image_donation_url");

        $nombreImagen = Str::uuid() . "." . $imagen->extension(); // Crear un nombre unico para las imagenes

        $path = public_path("/img/uploads/donations/" . $nombreImagen);

        $manager = new ImageManager(new Driver);

        $img = $manager->read($imagen);

        $img->resize(1000, 1000);

        $img->save($path);

        $process[0]->donation_payment = 1;
        $process[0]->image_donation_url = $nombreImagen;
        $process[0]->save();

        return redirect()->intended('my-files');
    }
}
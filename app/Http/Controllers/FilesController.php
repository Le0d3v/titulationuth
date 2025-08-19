<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\DataSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    public function downloadImg($id) {
         $process = Process::find($id);
         $image = $process->image_titulation_url;

        // Ruta del archivo en el sistema de almacenamiento
        $path = public_path('img/uploads/pictures/' . $image); // Ajusta la ruta según tu estructura

        // Verifica si el archivo existe
        if (!file_exists($path)) {
            abort(404);
        }

        // Retorna la descarga del archivo
        return response()->download($path);
    }

     public function pdfStore(Request $request)
    {
        // Obtener el Proceso
        $dataSchool = DataSchool::where("user_id", Auth::user()->id)->get();
        $process = Process::where("id", $dataSchool[0]->process_id)->get();



        // Validar el archivo
        $request->validate([
            'donation_pdf' => 'required|file|mimes:pdf', // Máximo 2MB
        ]);

        // Guardar el archivo
        $file = $request->file('donation_pdf');
        $nombre = time() . '_' . $file->getClientOriginalName();
        $ruta = $file->storeAs('/pdfs', $nombre, 'public'); // Almacena en storage/app/public/pdfs

        $process[0]->image_donation_url = $nombre;
        $process[0]->donation_payment = 2;
        $process[0]->save();

        return redirect()->intended('my-files');
    }

    public function downloadPDF($id) {
         $process = Process::find($id);
         $pdf = $process->image_donation_url;

        // Ruta del archivo en el sistema de almacenamiento
        $path = storage_path('app/public/pdfs/' . $pdf);

        // Verifica si el archivo existe
        if (!file_exists($path)) {
            abort(404);
        }

        // Retorna la descarga del archivo
        return response()->download($path);
    }
}


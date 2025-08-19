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
}


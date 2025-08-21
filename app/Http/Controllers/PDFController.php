<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DataSchool;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $data = DataSchool::where("id", $id)->get();

        $nombre = $data[0]->user->name;
        $carrera = $data[0]->career;
        $matricula = $data[0]->user->tuition;
        $titulo = "Desarrollo de un Sistema Web para la Gestión de Eventos";
        $fecha = "21 de junio de 2024";

        $pdf = Pdf::loadView('pdf.certificate', compact('nombre', 'carrera', 'matricula', 'titulo', 'fecha'));
        $pdf->setPaper('letter', 'portrait');
        $pdf->setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif']);

        return $pdf->download('certificado.pdf');
    }
}

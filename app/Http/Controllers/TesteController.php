<?php

namespace App\Http\Controllers;
use Codedge\Fpdf\Facades\Fpdf;
use Codedge\Fpdf\Fpdf\Fpdf as FpdfFpdf;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    

    public function index() 
    {
        $pdf = new FpdfFpdf();
        $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $pdf->SetFont('DejaVu','',14);
        $pdf->AddPage("L", ['100', '100']);
        $pdf->Text(10, 10, "Hello World!");
             
         
        $pdf->Output();
    }
}

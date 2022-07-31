<?php

namespace App\Http\Controllers;
use Codedge\Fpdf\Facades\Fpdf;
use Codedge\Fpdf\Fpdf\Fpdf as FpdfFpdf;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    

    public function index() 
    {
    
    $fpdf = new FpdfFpdf();
    $fpdf->AddPage();
    $fpdf->SetFont('Courier', 'B', 18);
    $fpdf->Cell(50, 25, 'Hello World!');
    $fpdf->Output();
    exit;
    
    

    }
}

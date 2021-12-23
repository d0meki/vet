<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\DB;
class ReportesController extends Controller
{
    public function GenerarReporteServicios()
    {

    //Obtengo los datos
    $registros=DB::table('servicios')
    ->select('servicios.*')
    ->get();

    //Ponemos la hoja Horizontal (L)
    $pdf = new Fpdf('L','mm','A4');
    $pdf->AddPage();
    $pdf->SetTextColor(35,56,113);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(0,10,utf8_decode("Lista Total de servicios adquiridos"),0,"","C");
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetTextColor(0,0,0);  // Establece el color del texto 
    $pdf->SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
    $pdf->SetFont('Arial','B',10); 
    //El ancho de las columnas debe de sumar promedio 190        
    $pdf->cell(35,8,utf8_decode("id"),1,"","L",true);
    $pdf->cell(80,8,utf8_decode("Nombre"),1,"","L",true);
    $pdf->cell(45,8,utf8_decode("Tipo_id"),1,"","L",true);
    $pdf->cell(35,8,utf8_decode("personal"),1,"","R",true);
    $pdf->cell(35,8,utf8_decode("Costo"),1,"","R",true);
    
    $pdf->Ln();
    $pdf->SetTextColor(0,0,0);  // Establece el color del texto 
    $pdf->SetFillColor(255, 255, 255); // establece el color del fondo de la celda
    $pdf->SetFont("Arial","",9);
    $TotalB = 0;
    $TotalN = 0;
    foreach ($registros as $reg)
    {
       $pdf->cell(35,8,utf8_decode($reg->id),1,"","L",true);
       $pdf->cell(80,8,utf8_decode($reg->nombre),1,"","L",true);
       $pdf->cell(45,8,utf8_decode($reg->tipo_id),1,"","L",true);
       $pdf->cell(35,8,utf8_decode($reg->personal),1,"","C",true);
       $pdf->cell(35,8,utf8_decode($reg->costo),1,"","R",true);
       $pdf->Ln(); 


    }
    /*$pdf->cell(160,8,utf8_decode("Ganancia Total de Ventas"),1,"","R",true);
    $pdf->cell(35,8,utf8_decode("Total Facturado: $TotalB"),1,"","R",true);
    $pdf->cell(35,8,utf8_decode("Total sin Facturar: $TotalN"),1,"","R",true);
    */    
    $pdf->Output();
    exit;
        

    }
    public function GenerarReporteBitacora()
    {

    //Obtengo los datos
    $registros=DB::table('bitacoras')
    ->select('bitacoras.*')
    ->get();

    //Ponemos la hoja Horizontal (L)
    $pdf = new Fpdf('L','mm','A4');
    $pdf->AddPage();
    $pdf->SetTextColor(35,56,113);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(0,10,utf8_decode("Bitacora General"),0,"","C");
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetTextColor(0,0,0);  // Establece el color del texto 
    $pdf->SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
    $pdf->SetFont('Arial','B',10); 
    //El ancho de las columnas debe de sumar promedio 190        
    $pdf->cell(10,8,utf8_decode("id"),1,"","L",true);
    $pdf->cell(35,8,utf8_decode("Fecha"),1,"","L",true);
    $pdf->cell(100,8,utf8_decode("Accion"),1,"","L",true);
    $pdf->cell(35,8,utf8_decode("IpMaquina"),1,"","R",true);
    $pdf->cell(35,8,utf8_decode("Usuario_id"),1,"","R",true);
    
    $pdf->Ln();
    $pdf->SetTextColor(0,0,0);  // Establece el color del texto 
    $pdf->SetFillColor(255, 255, 255); // establece el color del fondo de la celda
    $pdf->SetFont("Arial","",9);
    $TotalB = 0;
    $TotalN = 0;
    foreach ($registros as $reg)
    {
       $pdf->cell(10,8,utf8_decode($reg->id),1,"","L",true);
       $pdf->cell(35,8,utf8_decode($reg->fecha_hora),1,"","L",true);
       $pdf->cell(100,8,utf8_decode($reg->accion),1,"","L",true);
       $pdf->cell(35,8,utf8_decode($reg->maquina_ip),1,"","C",true);
       $pdf->cell(35,8,utf8_decode($reg->user_id),1,"","R",true);
       $pdf->Ln(); 


    }
    /*$pdf->cell(160,8,utf8_decode("Ganancia Total de Ventas"),1,"","R",true);
    $pdf->cell(35,8,utf8_decode("Total Facturado: $TotalB"),1,"","R",true);
    $pdf->cell(35,8,utf8_decode("Total sin Facturar: $TotalN"),1,"","R",true);
    */    
    $pdf->Output();
    exit;
        

    }
}

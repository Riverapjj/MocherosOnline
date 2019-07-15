<?php
require('plantillaReportes.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/articulos.php');

    session_start();    
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF();
    $articulo = new Articulos();
    $pdf->head('Mocheros - Reporte de productos por categoría');
    $pdf->SetFont('Arial','',12);
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(249,138,79);
    
    $categoria = '';    
    $pdf->Ln(0);
    $data = $articulo->maximoConsumidor();    
    
    foreach($data as $datos){     
        if(utf8_decode($datos['Nombre'] != $categoria)){
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',12);
            $pdf->setTextColor(255,255,255);
            $pdf->Cell(75,10, utf8_decode('Apellido'),1 , 0, 'C', true);
            $pdf->Cell(35,10, utf8_decode('Nombre'),1 , 0, 'C', true);
            $pdf->Cell(35,10, utf8_decode('Total'),1 , 0, 'C', true);
            $pdf->Ln(10);
        }

        $pdf->setTextColor(0,0,0);
        $pdf->Cell(75,10, utf8_decode($datos['Apellido']),1 , 0, 'C');
        $pdf->Cell(35,10, utf8_decode($datos['Nombre']),1 , 0, 'C'); 
        $pdf->Cell(40,10, utf8_decode('$'.$datos['Total']),1 , 0, 'C');   
         
        $pdf->Ln();
        
    }  
    $pdf->Cell(40,10, utf8_decode('Subtotal'),1 , 0, 'C', true); 
       
    $pdf->Output();
?>
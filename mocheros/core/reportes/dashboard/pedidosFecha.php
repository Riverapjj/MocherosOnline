<?php
require('plantillaReportes.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/pedidos.php');

    session_start();    
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF();
    $pedidos = new Pedidos();
    $pdf->head('Pedidos filtrados por rango de fecha desde '.$_GET['fecha1'].' hasta '.$_GET['fecha2']);
    $pdf->SetFont('Arial','',12);
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(249,138,79);
    
    $nombre = '';
    $pdf->Ln(0);
    $data = $pedidos->pedidosFechas("'" . $_GET['fecha1'] . "' '" . $_GET['fecha2'] . "'");
    
    foreach($data as $datos){     
        if(utf8_decode($datos['Nombre'] != $nombre)){
            $pdf->Ln(10);
            $pdf->SetFont('Arial','',12);
            $pdf->setTextColor(255,255,255);
            $pdf->Cell(35,10, utf8_decode('Nombre'),1 , 0, 'C', true);
            $pdf->Cell(35,10, utf8_decode('Email'),1 , 0, 'C', true);
            $pdf->Cell(35,10, utf8_decode('Fecha'),1 , 0, 'C', true);
            $pdf->Ln(10);
        }

        $pdf->setTextColor(0,0,0);
        $pdf->Cell(75,10, utf8_decode($datos['Apellido'].', '.$datos['Nombre']),1 , 0, 'C');
        $pdf->Cell(35,10, utf8_decode($datos['Email']),1 , 0, 'C'); 
        $pdf->Cell(40,10, utf8_decode($datos['Fecha']),1 , 0, 'C'); 
         
        $pdf->Ln();
        
    }  
       
    $pdf->Output();
?>
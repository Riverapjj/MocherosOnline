<?php
require('plantillaReportes.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/pedidos.php');

    session_start();    
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF('P','mm','Letter');
    $pedidos = new Pedidos();
    $pdf->head('Mocheros - Reporte de productos por categoría');
    $pdf->SetFont('Arial','',12);
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(249,138,79); 
    $pdf->Ln(0);
    $data = $pedidos->pedidosEstados("'".$_GET['estado']."'");
    $total = null;     
    imprimirHeader($pdf);
    imprimirBody($data, $pdf);
    imprimirFooter($data, $pdf, $total);

    

    function imprimirHeader($pdf){

        $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);
        $pdf->setTextColor(255,255,255);
        $pdf->Cell(60,10, utf8_decode('Nombre'),1 , 0, 'C', true);
        $pdf->Cell(40,10, utf8_decode('Email'),1 , 0, 'C', true);
        $pdf->Cell(50,10, utf8_decode('Fecha'),1 , 0, 'C', true);
        $pdf->Cell(40,10, utf8_decode('Total'),1 , 0, 'C', true);
        $pdf->Ln(10);

    }

    function imprimirBody($data, $pdf){
        foreach($data as $datos){
            if(!empty($datos['encabezado'])){
            $pdf->setTextColor(0,0,0);
            $pdf->Cell(60,10, utf8_decode($datos['Apellido'].', '.$datos['Nombre']),1 , 0, 'C');
            $pdf->Cell(40,10, utf8_decode($datos['Email']),1 , 0, 'C'); 
            $pdf->Cell(50,10, utf8_decode($datos['Fecha']),1 , 0, 'C');
            $totalformatenc = number_format($datos['Total'], 2, '.', ',');
            $pdf->Cell(40,10, '$'.$totalformatenc,1 , 0, 'C');
            
            $pdf->Ln();
            }else{

                $pdf->Cell(50,10, utf8_decode('No existen pedidos de este estado'),1 , 0, 'C');
            }
            
        }  
    }

    function imprimirFooter($data, $pdf, $total){
    foreach($data as $datos){    
                       
                    
            $total = $total + (float)$datos['Total'];
        
    }
    if(!empty($datos['encabezado'])){
    $pdf->SetFont('Arial','b',12);
    $pdf->Cell(150,10,'Total',1 , 0,'C', true);
    $totalformato = number_format($total, 2, '.', ',');
    $pdf->Cell(40,10,'$'.$totalformato,1 , 0, 'C', true);
    $pdf->Ln(11);
    $pdf->SetFont('Arial','I',12);
    $pdf->setTextColor(0,0,0);
    $pdf->setFillColor(255,255,255);   
    $pdf->Cell(190,10, utf8_decode('Lista de pedidos según el estado: '.$datos['TipoEstado']), 0, 0, 'C', true);              

    }
    }  
    $pdf->Output();
?>
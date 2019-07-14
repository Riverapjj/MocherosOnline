<?php
require('plantillaReportes.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/articulos.php');

    session_start();
    ini_set('date.timezone', 'America/El_Salvador');
    //definiendo tamaño de márgenes en mm
    //definiendo tamaño de página con 'Letter'
    $pdf = new PDF('P','mm','Letter');
    //definiendo la clase en la que se encuentra la función con la consulta sql para mostrar datos
    $articulo = new Articulos();
    $pdf->head('Mocheros - Reporte de productos por categoría');
    //propiedades del reporte, fuente
    $pdf->SetFont('Arial','',12);
    //color de texto
    $pdf->setTextColor(255,255,255);
    //color de relleno
    $pdf->setFillColor(249,138,79);
    $pdf->SetFont('Arial','B',12);
    //margen izquierdo 15 mm
    $pdf->SetLeftMargin(15);
    
    $categoria = '';    
    $pdf->Ln(0);
    //función que posee la consulta sql que obtiene los datos
    $data = $articulo->getProductosCategoria();    
    
    //foreach utilizado para llenar las filas de la tabla
    foreach($data as $datos){     
        if(utf8_decode($datos['categoria'] != $categoria)){
            $pdf->Ln(10);
            $pdf->setTextColor(255,255,255);
            $pdf->SetFont('Arial','',17);
            $pdf->Cell(150,10, utf8_decode($datos['categoria']),1 , 0, 'C', true);
            $pdf->Ln(16);
            $pdf->SetFont('Arial','',12);
            $pdf->setTextColor(255,255,255);
            $pdf->Cell(80,10, utf8_decode('Producto'),1 , 0, 'C', true);
            $pdf->Cell(35,10, utf8_decode('Precio unitario'),1 , 0, 'C', true);
            $pdf->Cell(35,10, utf8_decode('Existencias'),1 , 0, 'C', true);
            $pdf->Ln(10);
            $categoria = $datos['categoria'];
        }
        $pdf->setTextColor(0,0,0);
        $pdf->Cell(80,10, utf8_decode($datos['NomArticulo']),1 , 0, 'C');
        $pdf->Cell(35,10, utf8_decode('$'.$datos['PrecioUnitario']),1 , 0, 'C');
        $pdf->Cell(35,10, utf8_decode($datos['Cantidad']),1 , 0, 'C');    
        $pdf->Ln();  
    }      
    $pdf->Output();
?>
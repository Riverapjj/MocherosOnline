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
    $pdf->setFillColor(249,138,79); 
    $pdf->Ln(0);
    $data = $articulo->getProductosCategoria();      
    $listacategorias = array();

/* Separa categorias */
    foreach($data as $datos){ 
        array_push($listacategorias, $datos['categoria']); 
    }
/* Distingue categorias unicas */
    foreach (array_unique($listacategorias) as $itemcategoria){
     
        imprimirHeader($itemcategoria,$pdf);
        imprimirBody($itemcategoria,$data,$pdf);
        imprimirFooter($itemcategoria,$data,$pdf);
        
    }

    $pdf->Output();

    /* Función para imprimir encabezado(Nombre de categoria y columnas) */
    function imprimirHeader($nomcategoria,$pdf)
    {

            $pdf->Ln(10);
            $pdf->setTextColor(255,255,255);
            $pdf->SetFont('Arial','',17);
            $pdf->Cell(185,10, utf8_decode($nomcategoria),1 , 0, 'C', true);
            $pdf->Ln(16);
            $pdf->SetFont('Arial','',12);
            $pdf->setTextColor(255,255,255);
            $pdf->Cell(75,10, utf8_decode('Producto'),1 , 0, 'C', true);
            $pdf->Cell(35,10, utf8_decode('Precio unitario'),1 , 0, 'C', true);
            $pdf->Cell(35,10, utf8_decode('Existencias'),1 , 0, 'C', true);
            $pdf->Cell(40,10, utf8_decode('Subtotal'),1 , 0, 'C', true);
            $pdf->Ln(10);

    }

    /* Función para imprimir cuerpo(llena las columnas) */
    function imprimirBody($nomcategoria,$data,$pdf)
    {

        foreach ($data as $datos) {

            if ($datos['categoria'] == $nomcategoria) {
               // print($datos['categoria'].' - '.$nomcategoria);
            $pdf->setTextColor(0,0,0);
            $pdf->Cell(75,10, utf8_decode($datos['NomArticulo']),1 , 0, 'C');
            $pdf->Cell(35,10, utf8_decode('$'.$datos['PrecioUnitario']),1 , 0, 'C');
            $pdf->Cell(35,10, utf8_decode($datos['Cantidad']),1 , 0, 'C'); 
            $subtotalformato = number_format($datos['Subtotal'], 2, '.', ',');
            $pdf->Cell(40,10, utf8_decode('$'.$subtotalformato),1 , 0, 'C');   
            $pdf->Ln();  
            
            }
        }  

    }

    /* Función para imprimir pie(crea el total por tabla) */
    function imprimirFooter($nomcategoria,$data,$pdf){
            $total =0;
        foreach($data as $datos){
            if(utf8_decode($nomcategoria == $datos['categoria'])){                
                        
                $total = $total + (float)$datos['Subtotal'];
            
            }  
        }
        $pdf->SetFont('Arial','b',12);
        $pdf->Cell(145,10,'Total',1 , 0,'C', true);
        $totalformato = number_format($total, 2, '.', ',');
        $pdf->Cell(40,10,'$'.$totalformato,1 , 0, 'C', true);
        $pdf->Ln();                 
      
    } 
    
?>
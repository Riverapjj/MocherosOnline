<?php
require('plantillaReportes.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/articulos.php');

    session_start();    
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF('P','mm','Letter');
    $articulo = new Articulos();
    $pdf->head('Mocheros - Reporte de mayores consumidores');
    $pdf->SetFont('Arial','',12);
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(249,138,79); 
    $pdf->Ln(0);
    $data = $articulo->maximosConsumidores();
    $contador = 1;

    imprimirHeader($pdf);
    imprimirBody($data, $pdf, $contador);
    /* imprimirFooter($data,$pdf); */
        
  

    $pdf->Output();

    /* Función para imprimir encabezado(Nombre de categoria y columnas) */
    function imprimirHeader($pdf){

            $pdf->Ln(10);
            $pdf->setTextColor(255,255,255);
            $pdf->SetFont('Arial','B',10);
            $pdf->setTextColor(255,255,255);
            $pdf->Cell(40,10, utf8_decode('Posición'),1 , 0, 'C', true);
            $pdf->Cell(75,10, utf8_decode('Nombre'),1 , 0, 'C', true);
            $pdf->Cell(35,10, utf8_decode('Email'),1 , 0, 'C', true);
            $pdf->Cell(35,10, utf8_decode('Total'),1 , 0, 'C', true);            
            $pdf->Ln(10);

    }

    /* Función para imprimir cuerpo(llena las columnas) */
    function imprimirBody($data, $pdf, $contador){

        

        foreach($data as $datos){

            if(!empty($datos['IdUsuario'])){
                $pdf->SetFont('Arial','',10);
                $pdf->setTextColor(0,0,0);
                $pdf->Cell(40,10, '#'.$contador,1 , 0, 'C');
                $contador++;
                $pdf->Cell(75,10, utf8_decode($datos['Apellido'].', '.$datos['Nombre']),1 , 0, 'C');
                $pdf->Cell(35,10, utf8_decode($datos['Email']),1 , 0, 'C'); 
                $totalformato = number_format($datos['Total'], 2, '.', ',');
                $pdf->Cell(35,10, utf8_decode('$'.$totalformato),1 , 0, 'C');   
                $pdf->Ln();  
            
            }else{
                $pdf->Cell(40,10, 'No existen consumidores',1 , 0, 'C'); 
            }
        }  

    }

    /* Función para imprimir pie(crea el total por tabla) */
    /* function imprimirFooter($data,$pdf){
            $total =0;
        foreach($data as $datos){
            if(utf8_decode(!empty($datos['IdUsuario']))){                
                        
                $total = $total + (float)$datos['Subtotal'];
            
            }  
        }
        $pdf->SetFont('Arial','b',12);
        $pdf->Cell(145,10,'Total',1 , 0,'C', true);
        $totalformato = number_format($total, 2, '.', ',');
        $pdf->Cell(40,10,'$'.$totalformato,1 , 0, 'C', true);
        $pdf->Ln();                 
      
    }  */
    
?>
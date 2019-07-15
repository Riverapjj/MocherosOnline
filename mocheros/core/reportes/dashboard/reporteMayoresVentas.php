<?php
require('plantillaReportes.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/pedidos.php');

    session_start();    
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF('P','mm','Letter');
    $pedidos = new Pedidos();
    $pdf->head('Mocheros - Reporte de mayores consumidores');
    $pdf->SetFont('Arial','',12);
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(249,138,79); 
    $pdf->Ln(0);
    $data = $pedidos->mayoresVentas();

    imprimirHeader($pdf);
    imprimirBody($data, $pdf);
    /* imprimirFooter($data,$pdf); */
        
  

    $pdf->Output();

    /* Función para imprimir encabezado(Nombre de categoria y columnas) */
    function imprimirHeader($pdf){

            $pdf->Ln(10);
            $pdf->setTextColor(255,255,255);
            $pdf->SetFont('Arial','B',10);
            $pdf->setTextColor(255,255,255);
            $pdf->Cell(60,10, utf8_decode('Nombre'),1 , 0, 'C', true);
            $pdf->Cell(60,10, utf8_decode('Fecha'),1 , 0, 'C', true);
            $pdf->Cell(60,10, utf8_decode('Total'),1 , 0, 'C', true);          
            $pdf->Ln(10);

    }

    /* Función para imprimir cuerpo(llena las columnas) */
    function imprimirBody($data, $pdf){

        

        foreach($data as $datos){

            if(!empty($datos['IdEncabezado'])){
                $pdf->SetFont('Arial','',10);
                $pdf->setTextColor(0,0,0);
                $pdf->Cell(60,10, utf8_decode($datos['Apellido'].', '.$datos['Nombre']),1 , 0, 'C');
                $pdf->Cell(60,10, utf8_decode($datos['Fecha']),1 , 0, 'C'); 
                $totalformato = number_format($datos['Total'], 2, '.', ',');
                $pdf->Cell(60,10, utf8_decode('$'.$totalformato),1 , 0, 'C');   
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
<?php
require('plantilla-factura.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/pedidos.php');
    session_start();
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF();
    $ventas = new Pedidos();
    $pdf->head('Mocheros S.A de C.V - Factura');
    $pdf->SetFont('Times','',12);
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(249,138,79);
    $pdf->SetFont('Arial','B',12);
    $pdf->Ln(0);
    $suma = 0;    
            
    if(isset($_SESSION['idUsuario'])){
        if($ventas->setIdCliente($_SESSION['idUsuario'])){
            //método para obtener el último pre detalle o última venta
            $idDetalle = $ventas->getLastSale();
            //con 'idE' obtenés el id del encabezado
            if($ventas->setId($idDetalle['idE'])){
                //método que llena la tabla de la factura
                $data = $ventas->getSaleDetailReport();
                imprimirMembrete($pdf, $idDetalle);
                imprimirColumnas($pdf);
                imprimirBody($data, $pdf, $suma);
            }
        }
    }

    function imprimirMembrete($pdf, $idDetalle){
        $pdf->setTextColor(0,0,0);               
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(100,8, utf8_decode('Cliente: '. $idDetalle['CN'].' '.$idDetalle['CA']),0, 0, 'L', false);            
        $pdf->Ln();
        $pdf->Cell(100,8, utf8_decode('Teléfono: '. $idDetalle['telefono']),0 , 0, 'L', false);
        $pdf->Ln();
        $pdf->Cell(100,8, utf8_decode('Dirección: '. $idDetalle['direccion']),0 , 0, 'L', false);
        $pdf->Ln();
        $pdf->Cell(100,8, utf8_decode('Correo electrónico: '. $idDetalle['correo']),0 , 0, 'L', false);
        $pdf->Ln();
        //$pdf->Cell(100,8, utf8_decode('Fecha de compra: '. $idDetalle['fecha']),0 , 0, 'L', false);
                $pdf->Ln(16);
    }

    function imprimirColumnas($pdf){
        $pdf->setTextColor(255,255,255);
        $pdf->setFillColor(239,108,0);
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(100,10, utf8_decode('Artículo'),1 , 0, 'C',true);
        $pdf->Cell(35,10, utf8_decode('Precio unitario'),1 , 0, 'C',true);
        $pdf->Cell(30,10, utf8_decode('Cantidad'),1 , 0, 'C',true);
        $pdf->Cell(30,10, utf8_decode('Total'),1 , 0, 'C',true);
        $pdf->Ln();
    }

    function imprimirBody($data, $pdf, $suma){

        foreach($data as $index){
            $pdf->setTextColor(255,255,255);
            $pdf->Cell(100,10, utf8_decode($index['articulo']),1 , 0, 'C');
            $pdf->Cell(35,10, utf8_decode('$'.$index['precio']),1 , 0, 'C');
            $pdf->Cell(30,10, utf8_decode($index['cantidad']),1 , 0, 'C');
            $pdf->Cell(30,10, utf8_decode('$'.$index['Total']),1 , 0, 'C');
            $pdf->Ln();
            $suma += $index['Total'];
        }
        
    }
    $pdf->Ln(1);
    $pdf->setFont('Arial', 'B',15);
    $pdf->Cell(188,8, utf8_decode('Total: $'. $suma),0 , 0, 'R', false);
    $pdf->Output();
?>
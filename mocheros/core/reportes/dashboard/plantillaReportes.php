<?php
require('../../lib/fpdf181/fpdf.php');

class PDF extends FPDF
{
    //variable para almacenar el título del reporte
    private $title;      
    function head($title){
        $this->title = $title;
        $this->AliasNbPages();
        $this->AddPage();
    }

    //función para establecer la plantilla del encabezado del reporte
    function Header()
    {
        $this->Image('../../../resources/img/mocheros-logo.jpg',5,5, 30);
        $this->SetFont('Arial','B',20);
        $this->Cell(30);
        $this->setTextColor(255,255,255);
        $this->setFillColor(239,108,0);
        $this->Cell(160,20, utf8_decode($this->title),1 , 0, 'C', true);
        $this->Ln(0);
        $this->setTextColor(0,0,0);
        $this->SetFont('Arial','B',12);
        $this->Ln(20);
        $this->Cell(80,20, ('Fecha de realizacion: '. date('d/m/Y')),0 , 0, 'R', false);
        $this->Ln(5);
        $this->Cell(73,20, (' Hora de realizacion: '.date('G:i:s')),0 , 0, 'R', false);
        $this->Ln();                
    }

    //función para establecer el pie de página del reporte
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',10);
        $this->SetTextColor(0,0,0);
        // Número de página
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        $this->Cell(0,10,utf8_decode('Realizado por: '.$_SESSION['nombreUsuario']),0,'L','R');
        
    }
   
  
}

?>
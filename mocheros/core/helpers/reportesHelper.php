<?php
require "../lib/fpdf181/fpdf.php";

class Reportes extends fpdf
{
		function Header()
		{
			$this->Image("../../resources/img/mocheros-logo.jpg");
			$this->SetFont('Arial','B',16);
			$this->Cell(30);
			$this->Cell(120,10, 'Mocheros',0,0,'C');
			$this->Ln(20);
		}

		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
				
				
}
?>
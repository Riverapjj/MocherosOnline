<?php
include_once "../lib/fpdf181/fpdf.php";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('../../resources/img/mocheros-logo.jpg', 5, 5, 30);
$pdf->Cell(30);
$pdf->Cell(40,10,'Mocheros S.A de C.V');
$pdf->Output();
?>
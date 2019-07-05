<?php
	include 'reportesHelper.php';
	require 'database.php';
	
	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	$query = "SELECT NomArticulo, PrecioUnitario, Cantidad FROM articulos";
	$resultado = $sql->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'Producto',1,0,'C',1);
	$pdf->Cell(20,6,'Precio unitario',1,0,'C',1);
	$pdf->Cell(70,6,'Existencia',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['NomArticulo']),1,0,'C');
		$pdf->Cell(20,6,$row['PrecioUnitario'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['Cantidad']),1,1,'C');
	}
	$pdf->Output();
?>
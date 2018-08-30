<?php
require_once("../php/aut.php");
include("../conexion/bdd.php");
include("../lib/PHPExcel.php");

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Ing. Alejandro Rangel");
$objPHPExcel->getProperties()->setTitle("Reporte de presupuesto");
$objPHPExcel->createSheet(0);
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Reporte de presupuesto");
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
$estilo1 = new PHPExcel_Style();
$estilo1->applyFromArray(
  array('fill' => array(
      'type' => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('argb' => '800000')
    ),
    'borders' => array( //bordes
      'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    )
));
$estilo2 = new PHPExcel_Style();
$estilo2->applyFromArray(
  array('fill' => array(
      'type' => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('argb' => 'DCDCDC')
    ),
    'borders' => array( //bordes
      'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    )
));

$sql_cole = "SELECT colegio,cod_zona FROM colegios WHERE id='".$_POST["cole"]."'";
														
$req_cole = $bdd->prepare($sql_cole);
$req_cole->execute();
$cole = $req_cole->fetch();

	
$sql_z = "SELECT zona FROM zonas WHERE codigo='".$cole["cod_zona"]."'";
														
$req_z = $bdd->prepare($sql_z);
$req_z->execute();
$zona = $req_z->fetch();

$sql_u = "SELECT nombres, apellidos FROM usuarios WHERE cod_zona='".$cole["cod_zona"]."'";
														
$req_u = $bdd->prepare($sql_u);
$req_u->execute();
$usuario = $req_u->fetch();
$promotor=$usuario["nombres"]." ".$usuario["apellidos"];


//~ Ingreo de datos en la hojda de excel
$objPHPExcel->getActiveSheet()->SetCellValue("A3", "colegio");
$objPHPExcel->getActiveSheet()->SetCellValue("A4", "$cole[colegio]");
$objPHPExcel->getActiveSheet()->SetCellValue("B3", "Zona");
$objPHPExcel->getActiveSheet()->SetCellValue("B4", "$zona[zona]");
$objPHPExcel->getActiveSheet()->SetCellValue("C3", "Promotor");
$objPHPExcel->getActiveSheet()->SetCellValue("C1", "Reporte de presupuesto");
$objPHPExcel->getActiveSheet()->SetCellValue("C4", "$promotor");

$objPHPExcel->getActiveSheet()->SetCellValue("A7", "Título");
$objPHPExcel->getActiveSheet()->SetCellValue("B7", "Alumnos");
$objPHPExcel->getActiveSheet()->SetCellValue("C7", "Tasa compra");
$objPHPExcel->getActiveSheet()->SetCellValue("D7", "Alumnos x tasa");
$objPHPExcel->getActiveSheet()->SetCellValue("E7", "Precio");
$objPHPExcel->getActiveSheet()->SetCellValue("F7", "Descuento");
$objPHPExcel->getActiveSheet()->SetCellValue("G7", "Precio Neto");
$objPHPExcel->getActiveSheet()->SetCellValue("H7", "Venta Potencial");
$objPHPExcel->getActiveSheet()->getStyle("A3:F3")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);
$objPHPExcel->getActiveSheet()->getStyle("A7:I7")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);


	$sql = "SELECT p.id_colegio, p.precio, p.tasa_compra, p.descuento, l.libro,l.id_grado, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id  WHERE c.id='".$_POST["cole"]."' AND p.id_periodo='".$_POST["periodo"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

$conta=8;

foreach($presupuestos as $presupuesto) {

	if ($presupuesto["precio"] != 0) {
		
		$sq_gp = "SELECT  alumnos FROM grados_paralelos WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_grado='".$presupuesto["id_grado"]."' AND id_periodo='".$_POST["periodo"]."'";
														
		$req_gp = $bdd->prepare($sq_gp);
		$req_gp->execute();
		$gp = $req_gp->fetch();
		
		$tasa_c= $presupuesto["tasa_compra"] * 100;
		$alumnos_tasa= floor($gp["alumnos"] * $presupuesto["tasa_compra"]);
		$descuento= $presupuesto["descuento"] * 100;
		$precio_neto= $presupuesto["precio"] - ($presupuesto["precio"] * $presupuesto["descuento"]);
		$venta_potencial= $precio_neto * floor($gp["alumnos"] * $presupuesto["tasa_compra"]);

		$total_alumnos_tasa[]=$alumnos_tasa;
		$total_venta[]=$venta_potencial;
		$total_descuento[]=$descuento;


		$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$presupuesto[libro]");
		$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$gp[alumnos]");
		$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$tasa_c %");
		$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$alumnos_tasa");
		$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$ $presupuesto[precio]");
		$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$descuento %");
		$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$ $precio_neto");
		$objPHPExcel->getActiveSheet()->SetCellValue("H$conta", "$ $venta_potencial");

		$conta++;
	
	}
	
}
$sum_ventas=array_sum($total_venta);
$sum_ta=array_sum($total_alumnos_tasa);

$sum_descuento=array_sum($total_descuento);
$cantidad_descuento=sizeof($total_descuento);
$promedio_descuento=$sum_descuento/$cantidad_descuento;
$promedio_descuento=number_format($promedio_descuento,2);
$objPHPExcel->getActiveSheet()->SetCellValue("E2", "Total");
$objPHPExcel->getActiveSheet()->SetCellValue("D3", "Alumnos x tasa");
$objPHPExcel->getActiveSheet()->SetCellValue("D4", "$sum_ta");
$objPHPExcel->getActiveSheet()->SetCellValue("E3", "Descuento");
$objPHPExcel->getActiveSheet()->SetCellValue("E4", "$promedio_descuento %");
$objPHPExcel->getActiveSheet()->SetCellValue("F3", "Venta potencial");
$objPHPExcel->getActiveSheet()->SetCellValue("F4", "$ $sum_ventas");

foreach (range('A', 'Z') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
foreach (range('AA', 'ZZ') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Reporte_presupuesto_colegio_promotor.xlsx"');
$objWriter->save('php://output');
?>
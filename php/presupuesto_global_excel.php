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

	

$objPHPExcel->getActiveSheet()->SetCellValue("C1", "Reporte de presupuesto");

$objPHPExcel->getActiveSheet()->SetCellValue("A7", "Zona");
$objPHPExcel->getActiveSheet()->SetCellValue("B7", "Colegio");
$objPHPExcel->getActiveSheet()->SetCellValue("C7", "Título");
$objPHPExcel->getActiveSheet()->SetCellValue("D7", "Alumnos");
$objPHPExcel->getActiveSheet()->SetCellValue("E7", "Castigo");
$objPHPExcel->getActiveSheet()->SetCellValue("F7", "Venta Potencial");
$objPHPExcel->getActiveSheet()->mergeCells('G6:I6');
$objPHPExcel->getActiveSheet()->SetCellValue("G6", "Total");
$objPHPExcel->getActiveSheet()->SetCellValue("G7", "Alumnos");
$objPHPExcel->getActiveSheet()->SetCellValue("H7", "Castigo");
$objPHPExcel->getActiveSheet()->SetCellValue("I7", "%");
$objPHPExcel->getActiveSheet()->getStyle("A3:I3")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);
//centrar
$estilo = array( 
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

$objPHPExcel->getActiveSheet()->getStyle("G6")->applyFromArray($estilo);

$objPHPExcel->getActiveSheet()->getStyle("A7:I7")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);


	$sql = "SELECT p.id_colegio, p.precio, p.tasa_compra, p.descuento, l.libro,l.id_grado, c.colegio, z.zona,z.id as id_zona, u.nombres FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='".$_POST["periodo"]."'";
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
		$total_alumnos[]=$gp["alumnos"];

		$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$presupuesto[zona]");
		$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$presupuesto[colegio]");
		$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$presupuesto[libro]");
		$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$gp[alumnos]");
		$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$alumnos_tasa");
		$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$ $venta_potencial");

		$conta++;

	
	}
	
}
$sum_ventas=array_sum($total_venta);
$sum_ta=array_sum($total_alumnos_tasa);
$sum_alumnos=array_sum($total_alumnos);

$porcentaje= ($sum_ta / $sum_alumnos) *100;
$porcentaje= number_format($porcentaje,2);

//$sum_descuento=array_sum($total_descuento);
//$cantidad_descuento=sizeof($total_descuento);
//$promedio_descuento=$sum_descuento/$cantidad_descuento;
//$promedio_descuento=number_format($promedio_descuento,2);

$objPHPExcel->getActiveSheet()->SetCellValue("G8", "$sum_alumnos");
$objPHPExcel->getActiveSheet()->SetCellValue("H8", "$sum_ta");
$objPHPExcel->getActiveSheet()->SetCellValue("I8", "$porcentaje");

foreach (range('A', 'Z') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
foreach (range('AA', 'ZZ') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Reporte_presupuesto.xlsx"');
$objWriter->save('php://output');
?>
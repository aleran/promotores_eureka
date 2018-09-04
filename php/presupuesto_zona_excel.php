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

//poner imagen
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('test_img');
$objDrawing->setDescription('test_img');
$objDrawing->setPath('../assets/images/logo_eureka.png');

$objPHPExcel->getActiveSheet()->mergeCells('A1:A4');

$objDrawing->setCoordinates('A1');                      
//setOffsetX works properly
$objDrawing->setOffsetX(50); 
$objDrawing->setOffsetY(5);                
//set width, height
$objDrawing->setWidth(200); 
$objDrawing->setHeight(75); 
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

	
$sql_z = "SELECT zona FROM zonas WHERE codigo='".$_POST["zona"]."'";
														
$req_z = $bdd->prepare($sql_z);
$req_z->execute();
$zona = $req_z->fetch();

$sql_u = "SELECT nombres, apellidos FROM usuarios WHERE cod_zona='".$_POST["zona"]."'";
														
$req_u = $bdd->prepare($sql_u);
$req_u->execute();
$usuario = $req_u->fetch();
$promotor=$usuario["nombres"]." ".$usuario["apellidos"];


//~ Ingreo de datos en la hojda de excel
$objPHPExcel->getActiveSheet()->SetCellValue("B5", "Zona");
$objPHPExcel->getActiveSheet()->SetCellValue("B6", "$zona[zona]");
$objPHPExcel->getActiveSheet()->SetCellValue("C5", "Promotor");
$objPHPExcel->getActiveSheet()->mergeCells('C1:D1');
$objPHPExcel->getActiveSheet()->mergeCells('C3:D3');

$estilo_centrar = array( 
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

$objPHPExcel->getActiveSheet()->getStyle("C1")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("C3")->applyFromArray($estilo_centrar);

$estilo_negrita = array(
    'font' => array(
        'bold' => true
    )
);

$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('C3')->applyFromArray($estilo_negrita);

$objPHPExcel->getActiveSheet()->SetCellValue("C1", "Eureka Libros SAS");
$objPHPExcel->getActiveSheet()->SetCellValue("C3", "Presupuesto por zona");
$objPHPExcel->getActiveSheet()->SetCellValue("C6", "$promotor");


$objPHPExcel->getActiveSheet()->SetCellValue("A8", "Colegio");
$objPHPExcel->getActiveSheet()->SetCellValue("B8", "Título");
$objPHPExcel->getActiveSheet()->SetCellValue("C8", "Alumnos");
$objPHPExcel->getActiveSheet()->SetCellValue("D8", "Tasa compra");
$objPHPExcel->getActiveSheet()->SetCellValue("E8", "Castigo");
$objPHPExcel->getActiveSheet()->SetCellValue("F8", "Precio");
$objPHPExcel->getActiveSheet()->SetCellValue("G8", "Descuento");
$objPHPExcel->getActiveSheet()->SetCellValue("H8", "Precio Neto");
$objPHPExcel->getActiveSheet()->SetCellValue("I8", "Venta Potencial");

$objPHPExcel->getActiveSheet()->getStyle('A8:I8')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '01F400')
        )
    )
);


	$sql = "SELECT p.id_colegio, p.precio, p.tasa_compra, p.descuento, l.libro,l.id_grado, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona WHERE z.codigo='".$_POST["zona"]."' AND p.id_periodo='".$_POST["periodo"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();


	$sql_f = "SELECT MAX(fecha) as fecha FROM presupuestos p JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona WHERE z.codigo='".$_POST["zona"]."' AND p.id_periodo='".$_POST["periodo"]."'";
	$req_f = $bdd->prepare($sql_f);
	$req_f->execute();
	$fecha = $req_f->fetch();

$conta=9;

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

		$presupuesto["precio"]=number_format($presupuesto["precio"],0,",", ".");
		$precio_neto=number_format($precio_neto,2,",", ".");
		$venta_potencial=number_format($venta_potencial,2,",", ".");

		$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$presupuesto[colegio]");
		$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$presupuesto[libro]");
		$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$gp[alumnos]");
		$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$tasa_c %");
		$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$alumnos_tasa");
		$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$ $presupuesto[precio]");
		$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$descuento %");
		$objPHPExcel->getActiveSheet()->SetCellValue("H$conta", "$ $precio_neto");
		$objPHPExcel->getActiveSheet()->SetCellValue("I$conta", "$ $venta_potencial");

		$conta++;
	
	}
	
}
$sum_ventas=array_sum($total_venta);
$sum_ta=array_sum($total_alumnos_tasa);
$sum_ventas=number_format($sum_ventas,2,",", ".");

$sum_descuento=array_sum($total_descuento);
$cantidad_descuento=sizeof($total_descuento);
$promedio_descuento=$sum_descuento/$cantidad_descuento;
$promedio_descuento=number_format($promedio_descuento,2);

$conta++;

$objPHPExcel->getActiveSheet()->getStyle('A'.$conta.'')->applyFromArray($estilo_negrita);

$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "Total");
$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$sum_ta");
$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$promedio_descuento %");
$objPHPExcel->getActiveSheet()->SetCellValue("I$conta", "$ $sum_ventas");
$objPHPExcel->getActiveSheet()->SetCellValue("G5", "Fecha");
$objPHPExcel->getActiveSheet()->SetCellValue("G6", "$fecha[fecha]");

foreach (range('A', 'Z') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
foreach (range('AA', 'ZZ') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Reporte_presupuesto_zona.xlsx"');
$objWriter->save('php://output');
?>
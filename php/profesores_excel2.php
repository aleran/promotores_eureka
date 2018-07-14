<?php
require_once("../php/aut.php");
include("../conexion/bdd.php");
include("../lib/PHPExcel.php");

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Ing. Alejandro Rangel");
$objPHPExcel->getProperties()->setTitle("Reporte de trabajadores");
$objPHPExcel->createSheet(0);
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Reporte de trabajadores");
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



//~ Ingreo de datos en la hojda de excel

	$objPHPExcel->getActiveSheet()->SetCellValue("A1", "Zona");
	$objPHPExcel->getActiveSheet()->SetCellValue("B1", "Promotor");
	$objPHPExcel->getActiveSheet()->SetCellValue("C1", "Colegio");
	$objPHPExcel->getActiveSheet()->SetCellValue("D1", "Nombre");
	$objPHPExcel->getActiveSheet()->SetCellValue("E1", "Cargo");
	$objPHPExcel->getActiveSheet()->SetCellValue("F1", "Area");
	$objPHPExcel->getActiveSheet()->SetCellValue("G1", "Grado");
	$objPHPExcel->getActiveSheet()->SetCellValue("H1", "telefono");
	$objPHPExcel->getActiveSheet()->SetCellValue("I1", "email");
	$objPHPExcel->getActiveSheet()->SetCellValue("J1", "cumpleaños");

$objPHPExcel->getActiveSheet()->getStyle("A1:J1")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);


$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

$req_periodo = $bdd->prepare($sql_periodo);
$req_periodo->execute();
$gp_periodo = $req_periodo->fetch();



	$sql = "SELECT t.nombre, t.telefono,t.email,t.cumpleaños, ca.cargo, g.grado, m.materia, c.colegio, z.zona, u.nombres,u.apellidos FROM trabajadores_colegios t JOIN colegios c ON t.id_colegio=c.id JOIN cargos ca ON t.cargo=ca.id JOIN zonas z ON c.cod_zona=z.codigo JOIN grados_materias gm ON t.codigo=gm.cod_profesor JOIN grados g ON gm.id_grado=g.id JOIN materias m ON gm.id_materia=m.id JOIN usuarios u ON u.cod_zona=z.codigo";
	$req = $bdd->prepare($sql);
	$req->execute();
	$coles = $req->fetchAll();


$conta=2;
foreach($coles as $cole) {
		$promotor=$cole["nombres"]. " ".$cole["apellidos"];
		$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$cole[zona]");
		$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$promotor");
		$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$cole[colegio]");
		$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$cole[nombre]");
		$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$cole[cargo]");
		$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$cole[materia]");
		$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$cole[grado]");
		$objPHPExcel->getActiveSheet()->SetCellValue("H$conta", "$cole[telefono]");
		$objPHPExcel->getActiveSheet()->SetCellValue("I$conta", "$cole[email]");
		$objPHPExcel->getActiveSheet()->SetCellValue("J$conta", "$cole[cumpleaños]");


$conta++;
}
foreach (range('A', 'Z') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
foreach (range('AA', 'ZZ') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="profesores_general.xlsx"');
$objWriter->save('php://output');
?>
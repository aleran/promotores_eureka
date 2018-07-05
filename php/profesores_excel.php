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

if (isset($_POST["zona"])) {
	$sql_zona="SELECT zona FROM zonas WHERE codigo='".$_POST["zona"]."'";

	$req_zona = $bdd->prepare($sql_zona);
	$req_zona->execute();
	$zona = $req_zona->fetch();

}

else {


	$sql = "SELECT colegio, cod_zona FROM colegios WHERE id='".$_POST["cole"]."'";

	$req = $bdd->prepare($sql);
	$req->execute();
	$colegio = $req->fetch();

	$sql_zona="SELECT zona FROM zonas WHERE codigo='".$colegio["cod_zona"]."'";

	$req_zona = $bdd->prepare($sql_zona);
	$req_zona->execute();
	$zona = $req_zona->fetch();


	
}



//~ Ingreo de datos en la hojda de excel
$objPHPExcel->getActiveSheet()->SetCellValue("B1", "Zona");
$objPHPExcel->getActiveSheet()->SetCellValue("B2", "$zona[zona]");
if (isset($colegio)) {
	$objPHPExcel->getActiveSheet()->SetCellValue("C1", "Colegio");
	$objPHPExcel->getActiveSheet()->SetCellValue("C2", "$colegio[colegio]");

	$objPHPExcel->getActiveSheet()->SetCellValue("A4", "Nombre");
	$objPHPExcel->getActiveSheet()->SetCellValue("B4", "Cargo");
	$objPHPExcel->getActiveSheet()->SetCellValue("C4", "Area");
	$objPHPExcel->getActiveSheet()->SetCellValue("D4", "Grado");
	$objPHPExcel->getActiveSheet()->SetCellValue("E4", "telefono");
	$objPHPExcel->getActiveSheet()->SetCellValue("F4", "email");
	$objPHPExcel->getActiveSheet()->SetCellValue("G4", "cumpleaños");
}

else {
	$objPHPExcel->getActiveSheet()->SetCellValue("A4", "Colegio");
	$objPHPExcel->getActiveSheet()->SetCellValue("B4", "Nombre");
	$objPHPExcel->getActiveSheet()->SetCellValue("C4", "Cargo");
	$objPHPExcel->getActiveSheet()->SetCellValue("D4", "Area");
	$objPHPExcel->getActiveSheet()->SetCellValue("E4", "Grado");
	$objPHPExcel->getActiveSheet()->SetCellValue("F4", "telefono");
	$objPHPExcel->getActiveSheet()->SetCellValue("G4", "email");
	$objPHPExcel->getActiveSheet()->SetCellValue("H4", "cumpleaños");
}

$objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);
$objPHPExcel->getActiveSheet()->getStyle("A4:H4")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);

$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

$req_periodo = $bdd->prepare($sql_periodo);
$req_periodo->execute();
$gp_periodo = $req_periodo->fetch();


if (isset($_POST["zona"])) {

	$sql = "SELECT t.nombre, t.telefono,t.email,t.cumpleaños, ca.cargo, g.grado, m.materia, c.colegio FROM trabajadores_colegios t JOIN colegios c ON t.id_colegio=c.id JOIN cargos ca ON t.cargo=ca.id JOIN zonas z ON c.cod_zona=z.codigo JOIN grados_materias gm ON t.codigo=gm.cod_profesor JOIN grados g ON gm.id_grado=g.id JOIN materias m ON gm.id_materia=m.id WHERE z.codigo='".$_POST["zona"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$coles = $req->fetchAll();
}

else {

	$sql = "SELECT t.nombre, t.telefono,t.email,t.cumpleaños, ca.cargo, g.grado, m.materia FROM trabajadores_colegios t JOIN colegios c ON t.id_colegio=c.id JOIN cargos ca ON t.cargo=ca.id JOIN zonas z ON c.cod_zona=z.codigo JOIN grados_materias gm ON t.codigo=gm.cod_profesor JOIN grados g ON gm.id_grado=g.id JOIN materias m ON gm.id_materia=m.id WHERE c.id='".$_POST["cole"]."' GROUP BY gm.id_grado,gm.id_materia,gm.cod_profesor";
	$req = $bdd->prepare($sql);
	$req->execute();
	$coles = $req->fetchAll();
}

$conta=5;

foreach($coles as $cole) {


	if (isset($_POST["zona"])) {
		$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$cole[colegio]");
		$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$cole[nombre]");
		$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$cole[cargo]");
		$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$cole[materia]");
		$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$cole[grado]");
		$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$cole[telefono]");
		$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$cole[email]");
		$objPHPExcel->getActiveSheet()->SetCellValue("H$conta", "$cole[cumpleaños]");
	}

	else {

		$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$cole[nombre]");
		$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$cole[cargo]");
		$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$cole[materia]");
		$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$cole[grado]");
		$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$cole[telefono]");
		$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$cole[email]");
		$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$cole[cumpleaños]");
	}
	


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
header('Content-Disposition: attachment; filename="profesores.xlsx"');
$objWriter->save('php://output');
?>
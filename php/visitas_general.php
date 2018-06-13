<?php
require_once("../php/aut.php");
include("../conexion/bdd.php");
include("../lib/PHPExcel.php");

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Ing. Alejandro Rangel");
$objPHPExcel->getProperties()->setTitle("Reporte de cubrimiento");
$objPHPExcel->createSheet(0);
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Reporte de cubrimiento");
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


	$sql = "SELECT nombres,apellidos FROM usuarios WHERE cod_zona='".$_POST["zona"]."'";

	$req = $bdd->prepare($sql);
	$req->execute();
	$usuario = $req->fetch();
	$nombre_completo=$usuario["nombres"]." ".$usuario["apellidos"];
}

else {


	$sql = "SELECT nombres, apellidos, cod_zona FROM usuarios WHERE id='".$_POST["promo"]."'";

	$req = $bdd->prepare($sql);
	$req->execute();
	$usuario = $req->fetch();
	$nombre_completo=$usuario["nombres"]." ".$usuario["apellidos"];

	$sql_zona="SELECT zona FROM zonas WHERE codigo='".$usuario["cod_zona"]."'";

	$req_zona = $bdd->prepare($sql_zona);
	$req_zona->execute();
	$zona = $req_zona->fetch();


	
}



//~ Ingreo de datos en la hojda de excel
$objPHPExcel->getActiveSheet()->SetCellValue("B1", "Zona");
$objPHPExcel->getActiveSheet()->SetCellValue("B2", "$zona[zona]");
$objPHPExcel->getActiveSheet()->SetCellValue("C1", "Promotor");
$objPHPExcel->getActiveSheet()->SetCellValue("C2", "$nombre_completo");

$objPHPExcel->getActiveSheet()->SetCellValue("A4", "Fecha planificada");
$objPHPExcel->getActiveSheet()->SetCellValue("B4", "Colegio");
$objPHPExcel->getActiveSheet()->SetCellValue("C4", "Profesor");
$objPHPExcel->getActiveSheet()->SetCellValue("D4", "Objetivo");
$objPHPExcel->getActiveSheet()->SetCellValue("E4", "Resultado");
$objPHPExcel->getActiveSheet()->SetCellValue("F4", "Comentarios");
$objPHPExcel->getActiveSheet()->SetCellValue("G4", "Fecha ejecutada");
$objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);
$objPHPExcel->getActiveSheet()->getStyle("A4:G4")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);

$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

$req_periodo = $bdd->prepare($sql_periodo);
$req_periodo->execute();
$gp_periodo = $req_periodo->fetch();


if (isset($_POST["zona"])) {

	$sql = "SELECT o.objetivo, p.id as planid, p.resultado, p.cod_profesor, c.colegio, p.start, z.zona FROM plan_trabajo p JOIN colegios c ON p.id_colegio=c.id JOIN objetivos o ON p.id_objetivo=o.id JOIN zonas z ON z.codigo=c.cod_zona  WHERE c.cod_zona='".$_POST["zona"]."' AND p.id_periodo='".$gp_periodo["id"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$planes = $req->fetchAll();
}

else {

	$sql = "SELECT o.objetivo, p.id as planid, p.resultado,p.cod_profesor, c.colegio, p.start FROM plan_trabajo p JOIN colegios c ON p.id_colegio=c.id  JOIN objetivos o ON p.id_objetivo=o.id  WHERE p.id_promotor='".$_POST["promo"]."' AND p.id_periodo='".$gp_periodo["id"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$planes = $req->fetchAll();
}

$conta=5;

foreach($planes as $plan) {

	if ($plan["resultado"]==1) {

		$sql = "SELECT observaciones, fecha FROM visitas WHERE id_plan_trabajo='".$plan["planid"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		$visitas = $req->fetch();
	}

	$sql_profe = "SELECT nombre FROM trabajadores_colegios WHERE codigo='".$plan["cod_profesor"]."'";
	$req_profe = $bdd->prepare($sql_profe);
	$req_profe->execute();
	$profe = $req_profe->fetch();

	$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$plan[start]");
	$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$plan[colegio]");
	$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$profe[nombre]");
	$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$plan[objetivo]");
	$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$plan[resultado]");
	if ($plan["resultado"]==1) {
		$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$visitas[observaciones]");
		$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$visitas[fecha]");
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
header('Content-Disposition: attachment; filename="Visitas_general.xlsx"');
$objWriter->save('php://output');
?>
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



	$sql = "SELECT nombres, apellidos, cod_zona FROM usuarios WHERE id='".$_GET["promotor"]."'";

	$req = $bdd->prepare($sql);
	$req->execute();
	$usuario = $req->fetch();

	$nombre_completo=$usuario["nombres"]." ".$usuario["apellidos"];

	$sql_zona="SELECT zona FROM zonas WHERE codigo='".$usuario["cod_zona"]."'";

	$req_zona = $bdd->prepare($sql_zona);
	$req_zona->execute();
	$zona = $req_zona->fetch();

	$desde=$_GET["desde"]." "."00:00:00";
	$hasta=$_GET["hasta"]." "."23:59:59";

	$sql_pt = "SELECT id FROM plan_trabajo WHERE id_promotor='".$_GET["promotor"]."' AND start BETWEEN '".$desde."' AND '".$hasta."'";
	$req_pt = $bdd->prepare($sql_pt);
	$req_pt->execute();

	$plan_trabajo = $req_pt->rowCount();

	$sql_vi = "SELECT v.id FROM visitas v JOIN plan_trabajo p ON v.id_plan_trabajo=p.id WHERE p.id_promotor='".$_GET["promotor"]."'  AND fecha BETWEEN '".$desde."' AND '".$hasta."'";

	$req_vi = $bdd->prepare($sql_vi);
	$req_vi->execute();

	$visitas = $req_vi->rowCount();

	$cumplimiento = $visitas / $plan_trabajo;
	$cumplimiento = floor($cumplimiento * 100);

	

//~ Ingreo de datos en la hojda de excel
$objPHPExcel->getActiveSheet()->SetCellValue("B3", "Zona");
$objPHPExcel->getActiveSheet()->SetCellValue("B4", "$zona[zona]");
$objPHPExcel->getActiveSheet()->SetCellValue("C3", "Promotor");
$objPHPExcel->getActiveSheet()->SetCellValue("C1", "Reporte de visitas semanal");
$objPHPExcel->getActiveSheet()->SetCellValue("C4", "$nombre_completo");
$objPHPExcel->getActiveSheet()->SetCellValue("E3", "Programadas");
$objPHPExcel->getActiveSheet()->SetCellValue("F3", "$plan_trabajo");
$objPHPExcel->getActiveSheet()->SetCellValue("E4", "Ejecutadas");
$objPHPExcel->getActiveSheet()->SetCellValue("F4", "$visitas");
$objPHPExcel->getActiveSheet()->SetCellValue("E5", "Cumplimiento");
$objPHPExcel->getActiveSheet()->SetCellValue("F5", "$cumplimiento %");

$objPHPExcel->getActiveSheet()->SetCellValue("A7", "Fecha planificada");
$objPHPExcel->getActiveSheet()->SetCellValue("B7", "Colegio");
$objPHPExcel->getActiveSheet()->SetCellValue("C7", "Profesor");
$objPHPExcel->getActiveSheet()->SetCellValue("D7", "Objetivo");
$objPHPExcel->getActiveSheet()->SetCellValue("E7", "Resultado");
$objPHPExcel->getActiveSheet()->SetCellValue("F7", "Comentarios");
$objPHPExcel->getActiveSheet()->SetCellValue("G7", "Fecha ejecutada");
$objPHPExcel->getActiveSheet()->getStyle("A3:C3")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);
$objPHPExcel->getActiveSheet()->getStyle("A6:G6")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);

$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

$req_periodo = $bdd->prepare($sql_periodo);
$req_periodo->execute();
$gp_periodo = $req_periodo->fetch();



	$sql = "SELECT p.id as planid, p.resultado,p.cod_profesor, c.colegio, p.start, p.id_objetivo FROM plan_trabajo p JOIN colegios c ON p.id_colegio=c.id  WHERE p.id_promotor='".$_GET["promotor"]."' AND p.start BETWEEN '".$desde."' AND '".$hasta."' ORDER BY start ASC";
	$req = $bdd->prepare($sql);
	$req->execute();
	$planes = $req->fetchAll();

$conta=8;

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

	$sql_objetivo = "SELECT objetivo FROM objetivos WHERE id='".$plan["id_objetivo"]."'";
	$req_objetivo = $bdd->prepare($sql_objetivo);
	$req_objetivo->execute();
	$objetivo = $req_objetivo->fetch();

	$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$plan[start]");
	$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$plan[colegio]");
	$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$profe[nombre]");
	$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$objetivo[objetivo]");
	 if ($plan["resultado"]==1) {
		$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "Efectiva");
	}
	else {
		$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "No ejecutada");
	}
	
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
header('Content-Disposition: attachment; filename="Visitas_semanal.xlsx"');
$objWriter->save('php://output');
?>
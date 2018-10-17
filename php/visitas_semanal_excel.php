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

$estilo_centrar = array( 
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

$estilo_negrita = array(
    'font' => array(
        'bold' => true
    )
);

$objPHPExcel->getActiveSheet()->getStyle('A8:G8')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '01F400')
        )
    )
);



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

$objPHPExcel->getActiveSheet()->mergeCells('C1:D1');
$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->SetCellValue("C1", "Eureka Libros SAS");

$objPHPExcel->getActiveSheet()->mergeCells('C3:D3');
$objPHPExcel->getActiveSheet()->getStyle('C3')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('C3')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->SetCellValue("C3", "Reporte de visitas semanal");

$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('C6')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('E4')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('E4')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('E6')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('E6')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('A8:G8')->applyFromArray($estilo_negrita);

$objPHPExcel->getActiveSheet()->SetCellValue("B5", "Zona");
$objPHPExcel->getActiveSheet()->SetCellValue("B6", "$zona[zona]");
$objPHPExcel->getActiveSheet()->SetCellValue("C5", "Promotor");
$objPHPExcel->getActiveSheet()->SetCellValue("C6", "$nombre_completo");
$objPHPExcel->getActiveSheet()->SetCellValue("E4", "Programadas");
$objPHPExcel->getActiveSheet()->SetCellValue("F4", "$plan_trabajo");
$objPHPExcel->getActiveSheet()->SetCellValue("E5", "Ejecutadas");
$objPHPExcel->getActiveSheet()->SetCellValue("F5", "$visitas");
$objPHPExcel->getActiveSheet()->SetCellValue("E6", "Cumplimiento");
$objPHPExcel->getActiveSheet()->SetCellValue("F6", "$cumplimiento %");

$objPHPExcel->getActiveSheet()->SetCellValue("A8", "Fecha planificada");
$objPHPExcel->getActiveSheet()->SetCellValue("B8", "Colegio");
$objPHPExcel->getActiveSheet()->SetCellValue("C8", "Profesor");
$objPHPExcel->getActiveSheet()->SetCellValue("D8", "Objetivo");
$objPHPExcel->getActiveSheet()->SetCellValue("E8", "Resultado");
$objPHPExcel->getActiveSheet()->SetCellValue("F8", "Comentarios");
$objPHPExcel->getActiveSheet()->SetCellValue("G8", "Fecha ejecutada");


$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

$req_periodo = $bdd->prepare($sql_periodo);
$req_periodo->execute();
$gp_periodo = $req_periodo->fetch();



	$sql = "SELECT p.id as planid, p.resultado,p.cod_profesor, c.colegio, p.start, p.id_objetivo FROM plan_trabajo p JOIN colegios c ON p.id_colegio=c.id  WHERE p.id_promotor='".$_GET["promotor"]."' AND p.start BETWEEN '".$desde."' AND '".$hasta."' ORDER BY start ASC";
	$req = $bdd->prepare($sql);
	$req->execute();
	$planes = $req->fetchAll();

$conta=9;

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
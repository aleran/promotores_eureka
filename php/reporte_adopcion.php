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

$objPHPExcel->getActiveSheet()->mergeCells('G2:H2');
$objPHPExcel->getActiveSheet()->getStyle('G2')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('G2')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->SetCellValue("G2", "REPORTE DE ADOPCION");

$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('E4')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('E4')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('E6')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('E6')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('A9:L9')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('A10:L10')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('A9:L9')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('A10:L10')->applyFromArray($estilo_centrar);

$objPHPExcel->getActiveSheet()->SetCellValue("D5", "Zona");
$objPHPExcel->getActiveSheet()->SetCellValue("E5", "$zona[zona]");
$objPHPExcel->getActiveSheet()->SetCellValue("A5", "Colegio");
$objPHPExcel->getActiveSheet()->SetCellValue("B5", "Nombre del colegio");
$objPHPExcel->getActiveSheet()->SetCellValue("A6", "Promotor");
$objPHPExcel->getActiveSheet()->SetCellValue("B6", "$nombre_completo");
$objPHPExcel->getActiveSheet()->mergeCells('F5:G5');
$objPHPExcel->getActiveSheet()->mergeCells('F6:G6');
$objPHPExcel->getActiveSheet()->mergeCells('F7:G7');
$objPHPExcel->getActiveSheet()->SetCellValue("F5", "Potencial compra preescolar%");
$objPHPExcel->getActiveSheet()->SetCellValue("H5", "1");
$objPHPExcel->getActiveSheet()->SetCellValue("F6", "Potencial compra preescolar%");
$objPHPExcel->getActiveSheet()->SetCellValue("H6", "2");
$objPHPExcel->getActiveSheet()->SetCellValue("F7", "Potencial venta bachillerato%");
$objPHPExcel->getActiveSheet()->SetCellValue("H7", "3");



$objPHPExcel->getActiveSheet()->mergeCells('A9:A10');
$objPHPExcel->getActiveSheet()->mergeCells('B9:B10');
$objPHPExcel->getActiveSheet()->mergeCells('C9:C10');
$objPHPExcel->getActiveSheet()->mergeCells('D9:D10');
$objPHPExcel->getActiveSheet()->mergeCells('E9:H9');
$objPHPExcel->getActiveSheet()->mergeCells('I9:I10');
$objPHPExcel->getActiveSheet()->mergeCells('J9:J10');
$objPHPExcel->getActiveSheet()->mergeCells('K9:K10');
$objPHPExcel->getActiveSheet()->mergeCells('L9:L10');
$objPHPExcel->getActiveSheet()->getStyle('E9')->applyFromArray($estilo_centrar);


$objPHPExcel->getActiveSheet()->SetCellValue("A9", "Titulo");
$objPHPExcel->getActiveSheet()->SetCellValue("B9", "Grado");
$objPHPExcel->getActiveSheet()->SetCellValue("C9", "Paralelos");
$objPHPExcel->getActiveSheet()->SetCellValue("D9", "Alumnos");
$objPHPExcel->getActiveSheet()->SetCellValue("E9", "Venta estimada");
$objPHPExcel->getActiveSheet()->SetCellValue("E10", "COMP ACTV");
$objPHPExcel->getActiveSheet()->SetCellValue("F10", "PVP");
$objPHPExcel->getActiveSheet()->SetCellValue("G10", "VENTA BRUTA");
$objPHPExcel->getActiveSheet()->SetCellValue("H10", "Precio Facturación");
$objPHPExcel->getActiveSheet()->SetCellValue("I9", "Venta estimada");
$objPHPExcel->getActiveSheet()->SetCellValue("J9", "Precio Venta final");
$objPHPExcel->getActiveSheet()->SetCellValue("K9", "Venta real");
$objPHPExcel->getActiveSheet()->SetCellValue("L9", "Diferencia");


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
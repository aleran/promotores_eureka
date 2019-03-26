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
$objPHPExcel->getActiveSheet()->SetCellValue("A1", "Zona");
$objPHPExcel->getActiveSheet()->SetCellValue("B1", "Promotor");
$objPHPExcel->getActiveSheet()->SetCellValue("C1", "Código");
$objPHPExcel->getActiveSheet()->SetCellValue("D1", "Colegio");
$objPHPExcel->getActiveSheet()->SetCellValue("E1", "Barrio");
$objPHPExcel->getActiveSheet()->SetCellValue("F1", "Dirección");
$objPHPExcel->getActiveSheet()->SetCellValue("G1", "Telefono");
$objPHPExcel->getActiveSheet()->SetCellValue("H1", "Paralelos prescolar");
$objPHPExcel->getActiveSheet()->SetCellValue("I1", "Paralelos primaria");
$objPHPExcel->getActiveSheet()->SetCellValue("J1", "Paralelos bachillerato");
$objPHPExcel->getActiveSheet()->SetCellValue("K1", "Paralelos global");
$objPHPExcel->getActiveSheet()->SetCellValue("L1", "Alumnos preescolar");
$objPHPExcel->getActiveSheet()->SetCellValue("M1", "Alumnos primaria");
$objPHPExcel->getActiveSheet()->SetCellValue("N1", "Alumnos bachillerato");
$objPHPExcel->getActiveSheet()->SetCellValue("O1", "Alumnos global");
$objPHPExcel->getActiveSheet()->SetCellValue("P1", "Alumnos global");
$objPHPExcel->getActiveSheet()->getStyle("A1:P1")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);
$sql_periodo="SELECT id FROM periodos WHERE id='".$_POST["periodo"]."'";
$req_periodo = $bdd->prepare($sql_periodo);
$req_periodo->execute();
$gp_periodo = $req_periodo->fetch();
	$sql = "SELECT c.id, c.codigo, UPPER(c.colegio) as colegio, c.barrio, c.direccion,c.telefono, z.zona,u.nombres,u.apellidos FROM colegios c JOIN zonas z ON c.cod_zona=z.codigo JOIN usuarios u ON z.codigo=u.cod_zona ORDER BY z.codigo";
	$req = $bdd->prepare($sql);
	$req->execute();
	$coles = $req->fetchAll();
$conta=2;
foreach($coles as $cole) {

	$promotor=$cole["nombres"]." ".$cole["apellidos"];

	$sql_pre = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=1 AND id_periodo='".$gp_periodo["id"]."'";
	$req_pre = $bdd->prepare($sql_pre);
	$req_pre->execute();
	$gp_pre = $req_pre->fetch();
	$sql_jar = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=2 AND id_periodo='".$gp_periodo["id"]."'";
	$req_jar = $bdd->prepare($sql_jar);
	$req_jar->execute();
	$gp_jar = $req_jar->fetch();
	$sql_tra = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=3  AND id_periodo='".$gp_periodo["id"]."'";
	$req_tra = $bdd->prepare($sql_tra);
	$req_tra->execute();
	$gp_tra = $req_tra->fetch();
	$sql_1 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=4  AND id_periodo='".$gp_periodo["id"]."'";
	$req_1 = $bdd->prepare($sql_1);
	$req_1->execute();
	$gp_1 = $req_1->fetch();
	$sql_2 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=5  AND id_periodo='".$gp_periodo["id"]."'";
	$req_2 = $bdd->prepare($sql_2);
	$req_2->execute();
	$gp_2 = $req_2->fetch();
	$sql_3 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=6 AND id_periodo='".$gp_periodo["id"]."'";
	$req_3 = $bdd->prepare($sql_3);
	$req_3->execute();
	$gp_3 = $req_3->fetch();
	$sql_4 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=7  AND id_periodo='".$gp_periodo["id"]."'";
	$req_4 = $bdd->prepare($sql_4);
	$req_4->execute();
	$gp_4 = $req_4->fetch();
	$sql_5 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=8  AND id_periodo='".$gp_periodo["id"]."'";
	$req_5 = $bdd->prepare($sql_5);
	$req_5->execute();
	$gp_5 = $req_5->fetch();
	$sql_6 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=9  AND id_periodo='".$gp_periodo["id"]."'";
	$req_6 = $bdd->prepare($sql_6);
	$req_6->execute();
	$gp_6 = $req_6->fetch();
	$sql_7 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=10 AND  id_periodo='".$gp_periodo["id"]."'";
	$req_7 = $bdd->prepare($sql_7);
	$req_7->execute();
	$gp_7 = $req_7->fetch();
	$sql_8 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=11 AND  id_periodo='".$gp_periodo["id"]."'";
	$req_8 = $bdd->prepare($sql_8);
	$req_8->execute();
	$gp_8 = $req_8->fetch();
	$sql_9 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=12 AND id_periodo='".$gp_periodo["id"]."'";
	$req_9 = $bdd->prepare($sql_9);
	$req_9->execute();
	$gp_9 = $req_9->fetch();
	$sql_10 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=13 AND id_periodo='".$gp_periodo["id"]."'";
	$req_10 = $bdd->prepare($sql_10);
	$req_10->execute();
	$gp_10 = $req_10->fetch();
	$sql_11 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$cole['id']."' AND id_grado=14 AND id_periodo='".$gp_periodo["id"]."'";
	$req_11 = $bdd->prepare($sql_11);
	$req_11->execute();
	$gp_11 = $req_11->fetch();
	$paralelos_prescolar=$gp_pre["paralelos"] + $gp_jar["paralelos"] + $gp_tra["paralelos"];
	$paralelos_pri=$gp_1["paralelos"] + $gp_2["paralelos"] + $gp_3["paralelos"] + $gp_4["paralelos"] + $gp_5["paralelos"];
	$paralelos_bach=$gp_6["paralelos"] + $gp_7["paralelos"] + $gp_8["paralelos"] + $gp_9["paralelos"] + $gp_10["paralelos"] + $gp_11["paralelos"];
	$paralelos_global= $paralelos_pri + $paralelos_bach + $paralelos_prescolar;
	$alumnos_prescolar=$gp_pre["alumnos"] + $gp_jar["alumnos"] + $gp_tra["alumnos"];
	$alumnos_pri=$gp_1["alumnos"] + $gp_2["alumnos"] + $gp_3["alumnos"] + $gp_4["alumnos"] + $gp_5["alumnos"];
	$alumnos_bach=$gp_6["alumnos"] + $gp_7["alumnos"] + $gp_8["alumnos"] + $gp_9["alumnos"] + $gp_10["alumnos"] + $gp_11["alumnos"];
	$alumnos_global= $alumnos_pri + $alumnos_bach + $alumnos_prescolar;

	$sql_st = "SELECT status FROM colegios_status cs JOIN status_cubrimiento s ON cs.id_status=s.id WHERE cs.id_colegio='".$cole["id"]."' AND cs.id_periodo='".$gp_periodo["id"]."'";
	$req_st = $bdd->prepare($sql_st);
	$req_st->execute();
	$status = $req_st->fetch();


	$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$cole[zona]");
	$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$promotor");
	$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$cole[codigo]");
	$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$cole[colegio]");
	$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$cole[barrio]");
	$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$cole[direccion]");
	$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$cole[telefono]");
	$objPHPExcel->getActiveSheet()->SetCellValue("H$conta", "$paralelos_prescolar");
	$objPHPExcel->getActiveSheet()->SetCellValue("I$conta", "$paralelos_pri");
	$objPHPExcel->getActiveSheet()->SetCellValue("J$conta", "$paralelos_bach");
	$objPHPExcel->getActiveSheet()->SetCellValue("K$conta", "$paralelos_global");
	$objPHPExcel->getActiveSheet()->SetCellValue("L$conta", "$alumnos_prescolar");
	$objPHPExcel->getActiveSheet()->SetCellValue("M$conta", "$alumnos_pri");
	$objPHPExcel->getActiveSheet()->SetCellValue("N$conta", "$alumnos_bach");
	$objPHPExcel->getActiveSheet()->SetCellValue("O$conta", "$alumnos_global");
	if (!empty($status)) {
		
		$objPHPExcel->getActiveSheet()->SetCellValue("P$conta", "$status[status]");
	}else{
		$objPHPExcel->getActiveSheet()->SetCellValue("P$conta", "Por definir");
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
header('Content-Disposition: attachment; filename="cubrimiento_general.xlsx"');
$objWriter->save('php://output');
?>
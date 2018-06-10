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

$objPHPExcel->getActiveSheet()->SetCellValue("A4", "Código");
$objPHPExcel->getActiveSheet()->SetCellValue("B4", "Colegio");
$objPHPExcel->getActiveSheet()->SetCellValue("C4", "Barrio");
$objPHPExcel->getActiveSheet()->SetCellValue("D4", "Dirección");
$objPHPExcel->getActiveSheet()->SetCellValue("E4", "Telefono");
$objPHPExcel->getActiveSheet()->SetCellValue("F4", "Paralelos prescolar");
$objPHPExcel->getActiveSheet()->SetCellValue("G4", "Paralelos primaria");
$objPHPExcel->getActiveSheet()->SetCellValue("H4", "Paralelos bachillerato");
$objPHPExcel->getActiveSheet()->SetCellValue("I4", "Paralelos global");
$objPHPExcel->getActiveSheet()->SetCellValue("J4", "Alumnos preescolar");
$objPHPExcel->getActiveSheet()->SetCellValue("K4", "Alumnos primaria");
$objPHPExcel->getActiveSheet()->SetCellValue("L4", "Alumnos bachillerato");
$objPHPExcel->getActiveSheet()->SetCellValue("M4", "Alumnos global");
$objPHPExcel->getActiveSheet()->getStyle("A1:M1")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);
$objPHPExcel->getActiveSheet()->getStyle("A4:M4")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);

$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

$req_periodo = $bdd->prepare($sql_periodo);
$req_periodo->execute();
$gp_periodo = $req_periodo->fetch();


if (isset($_POST["zona"])) {

	$sql = "SELECT c.id, c.codigo, c.colegio, c.barrio, c.direccion,c.telefono, z.zona FROM colegios c JOIN zonas z ON c.cod_zona=z.codigo WHERE z.codigo='".$_POST["zona"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$coles = $req->fetchAll();
}

else {

	$sql = "SELECT c.id, c.codigo, c.colegio, c.barrio, c.direccion,c.telefono, z.zona FROM colegios c JOIN zonas z ON c.cod_zona=z.codigo WHERE z.codigo='".$usuario["cod_zona"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$coles = $req->fetchAll();
}

$conta=5;

foreach($coles as $cole) {


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



	$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$cole[codigo]");
	$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$cole[colegio]");
	$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$cole[barrio]");
	$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$cole[direccion]");
	$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$cole[telefono]");
	$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$paralelos_prescolar");
	$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$paralelos_pri");
	$objPHPExcel->getActiveSheet()->SetCellValue("H$conta", "$paralelos_bach");
	$objPHPExcel->getActiveSheet()->SetCellValue("I$conta", "$paralelos_global");
	$objPHPExcel->getActiveSheet()->SetCellValue("J$conta", "$alumnos_prescolar");
	$objPHPExcel->getActiveSheet()->SetCellValue("K$conta", "$alumnos_pri");
	$objPHPExcel->getActiveSheet()->SetCellValue("L$conta", "$alumnos_bach");
	$objPHPExcel->getActiveSheet()->SetCellValue("M$conta", "$alumnos_global");


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
header('Content-Disposition: attachment; filename="cubrimiento_por_zona.xlsx"');
$objWriter->save('php://output');
?>
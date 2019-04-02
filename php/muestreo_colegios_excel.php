<?php
require_once("../php/aut.php");
include("../conexion/bdd.php");
include("../lib/PHPExcel.php");

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Ing. Alejandro Rangel");
$objPHPExcel->getProperties()->setTitle("Reporte de muestreo");
$objPHPExcel->createSheet(0);
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Reporte de muestreo");
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

$estilo_fuente = array(
    'font' => array(
        'size' => 8.5
    )
);

$estilo_borde = array(
   'borders' => array( //bordes
      'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    )
);




//poner imagen
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('test_img');
$objDrawing->setDescription('test_img');
$objDrawing->setPath('../assets/images/logo_eureka.png');

$objPHPExcel->getActiveSheet()->mergeCells('A1:B4');

$objDrawing->setCoordinates('A1');                      
//setOffsetX works properly
$objDrawing->setOffsetX(1); 
$objDrawing->setOffsetY(5);                
//set width, height
$objDrawing->setWidth(200); 
$objDrawing->setHeight(75); 
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());



	$sql = "SELECT nombres, apellidos, cod_zona, id_pais FROM usuarios WHERE id='".$_POST["promo"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$usuario = $req->fetch();
	$nombre_completo=$usuario["nombres"]." ".$usuario["apellidos"];
	$sql_zona="SELECT zona FROM zonas WHERE codigo='".$usuario["cod_zona"]."'";
	$req_zona = $bdd->prepare($sql_zona);
	$req_zona->execute();
	$zona = $req_zona->fetch();
	
	$sql_periodo="SELECT periodo FROM periodos WHERE id='".$_POST["periodo"]."'";
	$req_periodo = $bdd->prepare($sql_periodo);
	$req_periodo->execute();
	$gp_periodo = $req_periodo->fetch();
	

//~ Ingreo de datos en la hojda de excel

$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->SetCellValue("B5", "Reporte de muestras ($nombre_completo) Periodo: $gp_periodo[periodo]");

$objPHPExcel->getActiveSheet()->SetCellValue("A7", "Colegio");
$objPHPExcel->getActiveSheet()->SetCellValue("B7", "Título");
$objPHPExcel->getActiveSheet()->SetCellValue("C7", "Cantidad");
$objPHPExcel->getActiveSheet()->SetCellValue("D7", "Fecha");

$objPHPExcel->getActiveSheet()->getStyle("A7:D7")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);
$objPHPExcel->getActiveSheet()->getStyle("A7:D7")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);


$sql = "SELECT UPPER(l.libro) as libro, l.id, UPPER (c.colegio) as colegio, c.id as coleid, m.fecha FROM muestreos m JOIN libros_muestreos lm ON lm.cod_muestreo=m.codigo JOIN libros l ON l.id=lm.id_libro  JOIN colegios c ON c.id=m.id_colegio WHERE m.id_usuario='".$_POST["promo"]."' AND m.id_periodo='".$_POST["periodo"]."' AND m.estado='2' ORDER BY c.id";

$req = $bdd->prepare($sql);
$req->execute();
$muestras = $req->fetchAll();

$conta=8;
foreach($muestras as $muestra) {

	$sql = "SELECT SUM(cantidad_aprob)  as cantidad FROM `libros_muestreos` lm JOIN muestreos m ON m.codigo=lm.cod_muestreo WHERE id_libro='".$muestra["id"]."' AND id_usuario='".$_POST["promo"]."' AND m.id_colegio='".$muestra["coleid"]."' AND m.id_periodo='".$_POST["periodo"]."'";

	$req = $bdd->prepare($sql);
	$req->execute();
	$cantidad = $req->fetch();

	$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$muestra[colegio]");
  $objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$muestra[libro]");
	$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$cantidad[cantidad]");
  $objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$muestra[fecha]");

	$conta++;
	$cant[]=$cantidad["cantidad"];

}
	$conta++;
	$total_cantidad=array_sum($cant);
	$objPHPExcel->getActiveSheet()->getStyle('B'.$conta)->applyFromArray($estilo_negrita);
	$objPHPExcel->getActiveSheet()->getStyle('C'.$conta)->applyFromArray($estilo_negrita);
	$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "TOTAL");
	$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$total_cantidad");
foreach (range('A', 'Z') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
foreach (range('AA', 'ZZ') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Muestreo_colegios.xlsx"');
$objWriter->save('php://output');

?>
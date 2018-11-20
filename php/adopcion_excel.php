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

	$sql_cole="SELECT colegio, cod_zona FROM colegios WHERE id='".$_POST["cole"]."'";

	$req_cole = $bdd->prepare($sql_cole);
	$req_cole->execute();
	$cole = $req_cole->fetch();

	$sql_zona="SELECT zona FROM zonas WHERE codigo='".$cole["cod_zona"]."'";

	$req_zona = $bdd->prepare($sql_zona);
	$req_zona->execute();
	$zona = $req_zona->fetch();


	$sql = "SELECT nombres, apellidos FROM usuarios WHERE cod_zona='".$cole["cod_zona"]."'";

	$req = $bdd->prepare($sql);
	$req->execute();
	$usuario = $req->fetch();

	$nombre_completo=$usuario["nombres"]." ".$usuario["apellidos"];


	

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
$objPHPExcel->getActiveSheet()->getStyle('A9:M9')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('A10:M10')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('A9:L9')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('A10:L10')->applyFromArray($estilo_centrar);

$objPHPExcel->getActiveSheet()->SetCellValue("D5", "Zona");
$objPHPExcel->getActiveSheet()->SetCellValue("E5", "$zona[zona]");
$objPHPExcel->getActiveSheet()->SetCellValue("A5", "Colegio");
$objPHPExcel->getActiveSheet()->SetCellValue("B5", "$cole[colegio]");
$objPHPExcel->getActiveSheet()->SetCellValue("A6", "Promotor");
$objPHPExcel->getActiveSheet()->SetCellValue("B6", "$nombre_completo");
$objPHPExcel->getActiveSheet()->mergeCells('F5:G5');
$objPHPExcel->getActiveSheet()->mergeCells('F6:G6');
$objPHPExcel->getActiveSheet()->mergeCells('F7:G7');
$objPHPExcel->getActiveSheet()->mergeCells('F8:G8');

$sql_pre = "SELECT avg(tasa_compra_d) * as p_pre FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN grados g ON g.id=l.id_grado WHERE p.id_colegio='".$_POST["cole"]."' AND p.id_periodo='".$_POST["periodo"]."' AND p.definido='1' AND l.id_grado BETWEEN '1' AND '3'";

$req_pre = $bdd->prepare($sql_pre);
$req_pre->execute();
$p_pre = $req_pre->fetch();

$sql_pri =  "SELECT avg(tasa_compra_d) as p_pri FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN grados g ON g.id=l.id_grado WHERE p.id_colegio='".$_POST["cole"]."' AND p.id_periodo='".$_POST["periodo"]."' AND p.definido='1' AND l.id_grado BETWEEN '4' AND '8'";

$req_pri = $bdd->prepare($sql_pri);
$req_pri->execute();
$p_pri = $req_pri->fetch();

$sql_sec =  "SELECT avg(tasa_compra_d) as p_sec FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN grados g ON g.id=l.id_grado WHERE p.id_colegio='".$_POST["cole"]."' AND p.id_periodo='".$_POST["periodo"]."' AND p.definido='1' AND l.id_grado BETWEEN '9' AND '14'";

$req_sec = $bdd->prepare($sql_sec);
$req_sec->execute();
$p_sec = $req_sec->fetch();

$p_pre=$p_pre["p_pre"] * 100;
$p_pri=$p_pri["p_pri"] * 100;
$p_sec=$p_sec["p_sec"] * 100;

$sql_descuento =  "SELECT avg(descuento_d) as descuento_pactado FROM presupuestos p WHERE p.id_colegio='".$_POST["cole"]."' AND p.id_periodo='".$_POST["periodo"]."' AND p.definido='1' ";

$req_descuento = $bdd->prepare($sql_descuento);
$req_descuento->execute();
$descuento = $req_descuento->fetch();
$descuento_pactado= $descuento["descuento_pactado"] * 100;

$objPHPExcel->getActiveSheet()->SetCellValue("F5", "Potencial compra preescolar %");
$objPHPExcel->getActiveSheet()->SetCellValue("H5", "$p_pre");
$objPHPExcel->getActiveSheet()->SetCellValue("F6", "Potencial compra preescolar %");
$objPHPExcel->getActiveSheet()->SetCellValue("H6", "$p_pri");
$objPHPExcel->getActiveSheet()->SetCellValue("F7", "Potencial venta bachillerato %");
$objPHPExcel->getActiveSheet()->SetCellValue("H7", "$p_sec");
$objPHPExcel->getActiveSheet()->SetCellValue("F8", "Descuento pactado %");
$objPHPExcel->getActiveSheet()->SetCellValue("H8", "$descuento_pactado");



$objPHPExcel->getActiveSheet()->mergeCells('A10:A11');
$objPHPExcel->getActiveSheet()->mergeCells('B10:B11');
$objPHPExcel->getActiveSheet()->mergeCells('C10:C11');
$objPHPExcel->getActiveSheet()->mergeCells('D10:D11');
$objPHPExcel->getActiveSheet()->mergeCells('E10:E11');
$objPHPExcel->getActiveSheet()->mergeCells('F10:I10');
$objPHPExcel->getActiveSheet()->mergeCells('J10:J11');
$objPHPExcel->getActiveSheet()->mergeCells('K10:K11');
$objPHPExcel->getActiveSheet()->mergeCells('L10:L11');
$objPHPExcel->getActiveSheet()->mergeCells('M10:M11');
$objPHPExcel->getActiveSheet()->getStyle('E10')->applyFromArray($estilo_centrar);


$objPHPExcel->getActiveSheet()->SetCellValue("A10", "Titulo");
$objPHPExcel->getActiveSheet()->SetCellValue("B10", "Grado");
$objPHPExcel->getActiveSheet()->SetCellValue("C10", "Paralelos");
$objPHPExcel->getActiveSheet()->SetCellValue("D10", "Alumnos");
$objPHPExcel->getActiveSheet()->SetCellValue("E10", "% Compra");
$objPHPExcel->getActiveSheet()->SetCellValue("F10", "Venta estimada");
$objPHPExcel->getActiveSheet()->SetCellValue("F11", "COMP ACTV");
$objPHPExcel->getActiveSheet()->SetCellValue("G11", "PVP");
$objPHPExcel->getActiveSheet()->SetCellValue("H11", "VENTA BRUTA");
$objPHPExcel->getActiveSheet()->SetCellValue("I11", "Precio Facturación");
$objPHPExcel->getActiveSheet()->SetCellValue("J10", "Venta estimada");
$objPHPExcel->getActiveSheet()->SetCellValue("K10", "Precio Venta final");
$objPHPExcel->getActiveSheet()->SetCellValue("L10", "Venta real");
$objPHPExcel->getActiveSheet()->SetCellValue("M10", "Diferencia");


$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

$req_periodo = $bdd->prepare($sql_periodo);
$req_periodo->execute();
$gp_periodo = $req_periodo->fetch();



	$sql = "SELECT l.libro, l.id_grado, g.grado, m.materia, p.precio, p.tasa_compra_d, p.descuento_d, p.precio_venta_final FROM libros l JOIN presupuestos p ON l.id=p.id_libro JOIN grados g ON l.id_grado=g.id JOIN materias m ON m.id=l.id_materia WHERE p.id_periodo='".$_POST["periodo"]."' AND p.definido='1' AND p.id_colegio='".$_POST["cole"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$adopciones = $req->fetchAll();

$conta=12;

foreach($adopciones as $adopcion) {

	$sq_gp = "SELECT  alumnos, paralelos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado='".$adopcion["id_grado"]."' AND id_periodo='".$_POST["periodo"]."'";
                           
    $req_gp = $bdd->prepare($sq_gp);
    $req_gp->execute();
    $gp = $req_gp->fetch();


    $tasa_compra=$adopcion["tasa_compra_d"] * 100;
    $comp_activos=$gp["alumnos"] * $adopcion["tasa_compra_d"];
    $comp_activos=floor($comp_activos);
    $venta_bruta=$adopcion["precio"] * $comp_activos;
    $precio_fact=$adopcion["precio"] - ($adopcion["precio"] * $descuento["descuento_pactado"]);
    $venta_estimada=$precio_fact * $comp_activos;
    $venta_real= $adopcion["precio_venta_final"] * $comp_activos;
    $diferencia=$venta_estimada - $venta_real;

	$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$adopcion[libro]");
	$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$adopcion[grado]");
	$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$gp[paralelos]");
	$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$gp[alumnos]");
	$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$tasa_compra");
	$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$comp_activos");
	$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$adopcion[precio]");
	$objPHPExcel->getActiveSheet()->SetCellValue("H$conta", "$venta_bruta");
	$objPHPExcel->getActiveSheet()->SetCellValue("I$conta", "$precio_fact");
	$objPHPExcel->getActiveSheet()->SetCellValue("J$conta", "$venta_estimada");
	$objPHPExcel->getActiveSheet()->SetCellValue("K$conta", "$adopcion[precio_venta_final]");
	$objPHPExcel->getActiveSheet()->SetCellValue("L$conta", "$venta_real");
	$objPHPExcel->getActiveSheet()->SetCellValue("M$conta", "$diferencia");


	$conta++;
	$t_alumnos[]=$gp["alumnos"];
	$t_paralelos[]=$gp["paralelos"];
	$t_compradores[]=$comp_activos;
	$t_venta_bruta[]=$venta_bruta;
	$t_venta_estimada[]=$venta_estimada;
	$t_venta_real[]=$venta_real;
	$t_diferencia[]=$diferencia;
	
}

$t_paralelos=array_sum($t_paralelos);
$t_alumnos=array_sum($t_alumnos);
$t_compradores=array_sum($t_compradores);
$t_venta_bruta=array_sum($t_venta_bruta);
$t_venta_estimada=array_sum($t_venta_estimada);
$t_venta_real=array_sum($t_venta_real);
$t_diferencia=array_sum($t_diferencia);

$objPHPExcel->getActiveSheet()->getStyle('A'.$conta.':M'.$conta)->applyFromArray($estilo_negrita);

$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "TOTAL VENTA");
$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$t_paralelos");
$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$t_alumnos");
$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$t_compradores");
$objPHPExcel->getActiveSheet()->SetCellValue("H$conta", "$t_venta_bruta");
$objPHPExcel->getActiveSheet()->SetCellValue("J$conta", "$t_venta_estimada");
$objPHPExcel->getActiveSheet()->SetCellValue("L$conta", "$t_venta_real");
$objPHPExcel->getActiveSheet()->SetCellValue("M$conta", "$diferencia");
foreach (range('A', 'Z') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
foreach (range('AA', 'ZZ') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo
$objWriter->setPreCalculateFormulas(true);
PHPExcel_Calculation::getInstance($objPHPExcel)->cyclicFormulaCount = 1;
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Reporte_adopcion.xlsx"');
$objWriter->save('php://output');
?>
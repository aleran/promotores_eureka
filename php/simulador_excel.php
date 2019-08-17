<?php
require_once("../php/aut.php");
include("../conexion/bdd.php");
include("../lib/PHPExcel.php");

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Ing. Alejandro Rangel");
$objPHPExcel->getProperties()->setTitle("Reporte de simulador");
$objPHPExcel->createSheet(0);
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Reporte de simulador");
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

	$sql_cole="SELECT colegio, cod_zona FROM colegios WHERE id='".$_GET["cole"]."'";

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

$objPHPExcel->getActiveSheet()->mergeCells('F2:H2');
$objPHPExcel->getActiveSheet()->getStyle('F2')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('F2')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->SetCellValue("F2", "REPORTE DE SIMULADOR");

$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('E4')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('E4')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('E6')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('E6')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('A10:N10')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('A9:L9')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('A10:N10')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('F11:J11')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('F11:J11')->applyFromArray($estilo_negrita);

$objPHPExcel->getActiveSheet()->SetCellValue("C5", "          ");
$objPHPExcel->getActiveSheet()->SetCellValue("E6", "          ");
$objPHPExcel->getActiveSheet()->SetCellValue("F4", "                 ");
$objPHPExcel->getActiveSheet()->SetCellValue("K4", "                 ");
$objPHPExcel->getActiveSheet()->SetCellValue("L4", "                 ");
$objPHPExcel->getActiveSheet()->SetCellValue("M4", "                 ");
$objPHPExcel->getActiveSheet()->SetCellValue("N4", "                 ");

$objPHPExcel->getActiveSheet()->SetCellValue("E5", "Zona:");
$objPHPExcel->getActiveSheet()->SetCellValue("F5", "$zona[zona]");
$objPHPExcel->getActiveSheet()->mergeCells('B5:C5');
$objPHPExcel->getActiveSheet()->mergeCells('B6:C6');
$objPHPExcel->getActiveSheet()->SetCellValue("A5", "Colegio:");
$objPHPExcel->getActiveSheet()->SetCellValue("B5", "$cole[colegio]");
$objPHPExcel->getActiveSheet()->SetCellValue("A6", "Promotor:");
$objPHPExcel->getActiveSheet()->SetCellValue("B6", "$nombre_completo");
$objPHPExcel->getActiveSheet()->mergeCells('G5:I5');
$objPHPExcel->getActiveSheet()->mergeCells('G6:I6');
$objPHPExcel->getActiveSheet()->mergeCells('G7:I7');
$objPHPExcel->getActiveSheet()->mergeCells('G8:I8');



$sql_descuento =  "SELECT avg(descuento) as descuento_pactado FROM presupuestos p WHERE p.id_colegio='".$_GET["cole"]."' AND p.id_periodo='".$_GET["periodo"]."' AND p.tasa_compra > 0";

$req_descuento = $bdd->prepare($sql_descuento);
$req_descuento->execute();
$descuento = $req_descuento->fetch();
$descuento_pactado= $descuento["descuento_pactado"] * 100;


$objPHPExcel->getActiveSheet()->mergeCells('A10:A11');
$objPHPExcel->getActiveSheet()->mergeCells('B10:B11');
$objPHPExcel->getActiveSheet()->mergeCells('C10:C11');
$objPHPExcel->getActiveSheet()->mergeCells('D10:D11');
$objPHPExcel->getActiveSheet()->mergeCells('E10:E11');
$objPHPExcel->getActiveSheet()->mergeCells('F10:J10');
$objPHPExcel->getActiveSheet()->mergeCells('K10:K11');
$objPHPExcel->getActiveSheet()->mergeCells('L10:L11');
$objPHPExcel->getActiveSheet()->mergeCells('M10:M11');
$objPHPExcel->getActiveSheet()->mergeCells('N10:N11');
$objPHPExcel->getActiveSheet()->getStyle('E10')->applyFromArray($estilo_centrar);

$objPHPExcel->getActiveSheet()->getStyle('A10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('B10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('C10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('D10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('E10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('F10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('G10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('H10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('I10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('J10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('K10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('L10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('M10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('N10')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('F11')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('G11')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('H11')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('I11')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('J11')->applyFromArray($estilo_borde);

$objPHPExcel->getActiveSheet()->SetCellValue("A10", "TITULO");
$objPHPExcel->getActiveSheet()->SetCellValue("B10", "GRADO");
$objPHPExcel->getActiveSheet()->SetCellValue("C10", "CURSOS");
$objPHPExcel->getActiveSheet()->SetCellValue("D10", "ALUM \n NOS");
$objPHPExcel->getActiveSheet()->SetCellValue("E10", "% COMP");
$objPHPExcel->getActiveSheet()->SetCellValue("F10", "VENTA ESTIMADA");
$objPHPExcel->getActiveSheet()->SetCellValue("F11", "COM ACT.");
$objPHPExcel->getActiveSheet()->SetCellValue("G11", "PVP");
$objPHPExcel->getActiveSheet()->SetCellValue("H11", "DESC.%");
$objPHPExcel->getActiveSheet()->SetCellValue("I11", "V. BRUTA");
$objPHPExcel->getActiveSheet()->SetCellValue("J11", "P. FACT");
$objPHPExcel->getActiveSheet()->SetCellValue("K10", "VENTA \n ESTIMADA");
$objPHPExcel->getActiveSheet()->SetCellValue("L10", "PRECIO \n VENTA F");
$objPHPExcel->getActiveSheet()->SetCellValue("M10", "VENTA \n REAL");
$objPHPExcel->getActiveSheet()->SetCellValue("N10", "DIFEREN \n CIA");


$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

$req_periodo = $bdd->prepare($sql_periodo);
$req_periodo->execute();
$gp_periodo = $req_periodo->fetch();



	$sql = "SELECT l.libro, l.id_grado, g.grado, m.materia, p.precio, p.tasa_compra, p.descuento, p.precio_venta_final, p.id_libro, p.cod_area FROM libros l JOIN presupuestos p ON l.id=p.id_libro JOIN grados g ON l.id_grado=g.id JOIN materias m ON m.id=l.id_materia WHERE p.id_periodo='".$_GET["periodo"]."' AND p.id_colegio='".$_GET["cole"]."' AND p.tasa_compra > 0";
	$req = $bdd->prepare($sql);
	$req->execute();
	$adopciones = $req->fetchAll();

	if (empty($adopciones) ) {
 		echo "<script>alert('Aun no hay adopciones en este colegio');window.location='../reporte_adopcion.php'</script>";
 	}else {

$conta=12;
 
foreach($adopciones as $adopcion) {

	if ($adopcion["id_grado"] == 17) {
		# code...
	}
	$sql_go = "SELECT a.id_grado_otro FROM areas_objetivas a WHERE id_periodo='".$_GET["periodo"]."' AND id_colegio='".$_GET["cole"]."' AND codigo='".$adopcion["cod_area"]."'";
	$req_go = $bdd->prepare($sql_go);
	$req_go->execute();
	$go = $req_go->fetch();

	if ($go["id_grado_otro"] == 0) {

		$sq_gp = "SELECT  alumnos, paralelos FROM grados_paralelos WHERE id_colegio='".$_GET["cole"]."' AND id_grado='".$adopcion["id_grado"]."' AND id_periodo='".$_GET["periodo"]."'";

	}else {

		$sq_gp = "SELECT  alumnos, paralelos FROM grados_paralelos WHERE id_colegio='".$_GET["cole"]."' AND id_grado='".$go["id_grado_otro"]."' AND id_periodo='".$_GET["periodo"]."'";
	}

                           
    $req_gp = $bdd->prepare($sq_gp);
    $req_gp->execute();
    $gp = $req_gp->fetch();

   


    $tasa_compra=$adopcion["tasa_compra"] * 100;
    $comp_activos=$gp["alumnos"] * $adopcion["tasa_compra"];
    $comp_activos=floor($comp_activos);
    $descuento=$adopcion["descuento"] * 100;
    $venta_bruta=$adopcion["precio"] * $comp_activos;
    $precio_fact=$adopcion["precio"] - ($adopcion["precio"] * $adopcion["descuento"]);
    $venta_estimada=$precio_fact * $comp_activos;
    $venta_real= $adopcion["precio_venta_final"] * $comp_activos;
    $diferencia=$venta_real - $venta_estimada;

    $objPHPExcel->getActiveSheet()->getStyle('A'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('B'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('C'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('D'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('E'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('F'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('G'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('H'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('I'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('J'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('K'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('L'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$conta)->applyFromArray($estilo_borde);
	$objPHPExcel->getActiveSheet()->getStyle('N'.$conta)->applyFromArray($estilo_borde);

	$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$adopcion[libro]");

	if ($go["id_grado_otro"] == 0) {

		$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$adopcion[grado]");
		if ($adopcion["id_grado"] < 4) {
			$p_pre[]=$tasa_compra;
		}elseif ($adopcion["id_grado"] > 3 && $adopcion["id_grado"] < 9) {
			$p_pri[]=$tasa_compra;
		}else {
			$p_sec[]=$tasa_compra;
		}

	}else{

		$sql_go1 = "SELECT grado FROM grados WHERE id='".$go["id_grado_otro"]."'";
		$req_go1 = $bdd->prepare($sql_go1);
		$req_go1->execute();
		$go1 = $req_go1->fetch();

		$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$go1[grado]");
		if ($go["id_grado_otro"] < 4) {
			$p_pre[]=$tasa_compra;
		}elseif ($go["id_grado_otro"] > 3 && $go["id_grado_otro"] < 9) {
			$p_pri[]=$tasa_compra;
		}else {
			$p_sec[]=$tasa_compra;
		}
	}

	$pvp=number_format($adopcion["precio"],0,",", ".");
	$venta_bruta1=number_format($venta_bruta,0,",", ".");
	$precio_fact1=number_format($precio_fact,0,",", ".");
	$venta_estimada1=number_format($venta_estimada,0,",", ".");
	$p_final=number_format($adopcion["precio_venta_final"],0,",", ".");
	$venta_real1=number_format($venta_real,0,",", ".");
	$diferencia1=number_format($diferencia,0,",", ".");
	
	$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$gp[paralelos]");
	$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$gp[alumnos]");
	$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$tasa_compra");
	$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$comp_activos");
	$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$$adopcion[precio]");
	$objPHPExcel->getActiveSheet()->SetCellValue("H$conta", "$descuento");
	$objPHPExcel->getActiveSheet()->SetCellValue("I$conta", "$$venta_bruta1");
	$objPHPExcel->getActiveSheet()->SetCellValue("J$conta", "$$precio_fact1");
	$objPHPExcel->getActiveSheet()->SetCellValue("K$conta", "$$venta_estimada1");
	$objPHPExcel->getActiveSheet()->SetCellValue("L$conta", "$$p_final");
	$objPHPExcel->getActiveSheet()->SetCellValue("M$conta", "$$venta_real1");
	$objPHPExcel->getActiveSheet()->SetCellValue("N$conta", "$$diferencia1");


	$conta++;
	$t_alumnos[]=$gp["alumnos"];
	$t_paralelos[]=$gp["paralelos"];
	$t_compradores[]=$comp_activos;
	$t_venta_bruta[]=$venta_bruta;
	$t_venta_estimada[]=$venta_estimada;
	$t_venta_real[]=$venta_real;
	$t_diferencia[]=$diferencia;
	
}
if (isset($p_pre)) {
	$p_pre=array_sum($p_pre)/count($p_pre);
}else {
	$p_pre=0;
}
if (isset($p_pri)) {
	$p_pri=array_sum($p_pri)/count($p_pri);
}else{
	$p_pri=0;
}
if (isset($p_sec)) {
	$p_sec=array_sum($p_sec)/count($p_sec);
}else{
	$p_sec=0;
}

  
    
$objPHPExcel->getActiveSheet()->SetCellValue("G5", "Potencial compra preescolar %");
$objPHPExcel->getActiveSheet()->getStyle('J5')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->SetCellValue("J5", "$p_pre");
$objPHPExcel->getActiveSheet()->SetCellValue("G6", "Potencial compra primaria %");
$objPHPExcel->getActiveSheet()->getStyle('J6')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->SetCellValue("J6", "$p_pri");
$objPHPExcel->getActiveSheet()->SetCellValue("G7", "Potencial venta bachillerato %");
$objPHPExcel->getActiveSheet()->getStyle('J7')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->SetCellValue("J7", "$p_sec");
$objPHPExcel->getActiveSheet()->SetCellValue("G8", "Promedio descuento %");
$objPHPExcel->getActiveSheet()->getStyle('J8')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->SetCellValue("J8", "$descuento_pactado");

$t_paralelos=array_sum($t_paralelos);
$t_alumnos=array_sum($t_alumnos);
$t_compradores=array_sum($t_compradores);
$t_venta_bruta=array_sum($t_venta_bruta);
$t_venta_estimada=array_sum($t_venta_estimada);
$t_venta_real=array_sum($t_venta_real);
$t_diferencia=array_sum($t_diferencia);


$objPHPExcel->getActiveSheet()->getStyle('A'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('B'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('C'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('D'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('E'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('F'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('G'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('H'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('I'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('J'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('K'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('L'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('M'.$conta)->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->getStyle('N'.$conta)->applyFromArray($estilo_borde);

$t_venta_bruta=number_format($t_venta_bruta,0,",", ".");
$t_venta_estimada=number_format($t_venta_estimada,0,",", ".");
$t_venta_real=number_format($t_venta_real,0,",", ".");
$t_diferencia=number_format($t_diferencia,0,",", ".");

$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "TOTAL VENTA");
$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$t_paralelos");
$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$t_alumnos");
$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$t_compradores");
$objPHPExcel->getActiveSheet()->SetCellValue("I$conta", "$$t_venta_bruta");
$objPHPExcel->getActiveSheet()->SetCellValue("K$conta", "$$t_venta_estimada");
$objPHPExcel->getActiveSheet()->SetCellValue("M$conta", "$$t_venta_real");
$objPHPExcel->getActiveSheet()->SetCellValue("N$conta", "$$t_diferencia");




$conta1=$conta + 2;
$conta2=$conta1 + 1;

$conta3=$conta2 + 2;
$conta4=$conta3 + 1;

$conta5=$conta4+ 2;

$conta6=$conta5 + 2;
$conta7=$conta6 + 1;

$conta8=$conta7 + 4;


$objPHPExcel->getActiveSheet()->getStyle('A1:N'.$conta8)->applyFromArray($estilo_fuente);
$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setWidth('30');

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo
$objWriter->setPreCalculateFormulas(true);
PHPExcel_Calculation::getInstance($objPHPExcel)->cyclicFormulaCount = 1;
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Reporte_simulador.xlsx"');
$objWriter->save('php://output');

}
?>
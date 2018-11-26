<?php
require_once("../php/aut.php");
include("../conexion/bdd.php");
include("../lib/PHPExcel.php");

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Ing. Alejandro Rangel");
$objPHPExcel->getProperties()->setTitle("Reporte de adopcion");
$objPHPExcel->createSheet(0);
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Reporte de adopcion");
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
        'size' => 9
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

$objPHPExcel->getActiveSheet()->mergeCells('F2:G2');
$objPHPExcel->getActiveSheet()->getStyle('F2')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('F2')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->SetCellValue("F2", "REPORTE DE ADOPCION");

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

$objPHPExcel->getActiveSheet()->SetCellValue("C5", "          ");
$objPHPExcel->getActiveSheet()->SetCellValue("E6", "          ");
$objPHPExcel->getActiveSheet()->SetCellValue("F4", "                 ");
$objPHPExcel->getActiveSheet()->SetCellValue("K4", "                 ");
$objPHPExcel->getActiveSheet()->SetCellValue("L4", "                 ");
$objPHPExcel->getActiveSheet()->SetCellValue("M4", "                 ");
$objPHPExcel->getActiveSheet()->SetCellValue("N4", "                 ");

$objPHPExcel->getActiveSheet()->SetCellValue("D5", "Zona:");
$objPHPExcel->getActiveSheet()->SetCellValue("E5", "$zona[zona]");
$objPHPExcel->getActiveSheet()->SetCellValue("A5", "Colegio:");
$objPHPExcel->getActiveSheet()->SetCellValue("B5", "$cole[colegio]");
$objPHPExcel->getActiveSheet()->SetCellValue("A6", "Promotor:");
$objPHPExcel->getActiveSheet()->SetCellValue("B6", "$nombre_completo");
$objPHPExcel->getActiveSheet()->mergeCells('F5:G5');
$objPHPExcel->getActiveSheet()->mergeCells('F6:G6');
$objPHPExcel->getActiveSheet()->mergeCells('F7:G7');
$objPHPExcel->getActiveSheet()->mergeCells('F8:G8');



$sql_descuento =  "SELECT avg(descuento_d) as descuento_pactado FROM presupuestos p WHERE p.id_colegio='".$_POST["cole"]."' AND p.id_periodo='".$_POST["periodo"]."' AND p.definido='1' ";

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
$objPHPExcel->getActiveSheet()->SetCellValue("C10", "PARALELOS");
$objPHPExcel->getActiveSheet()->SetCellValue("D10", "ALUMNOS");
$objPHPExcel->getActiveSheet()->SetCellValue("E10", "% COMPRA");
$objPHPExcel->getActiveSheet()->SetCellValue("F10", "VENTA ESTIMADA");
$objPHPExcel->getActiveSheet()->SetCellValue("F11", "COMP ACTV");
$objPHPExcel->getActiveSheet()->SetCellValue("G11", "PVP");
$objPHPExcel->getActiveSheet()->SetCellValue("H11", "DESCUENTO %");
$objPHPExcel->getActiveSheet()->SetCellValue("I11", "VENTA BRUTA");
$objPHPExcel->getActiveSheet()->SetCellValue("J11", "PRECIO FACTURACION");
$objPHPExcel->getActiveSheet()->SetCellValue("K10", "VENTA ESTIMADA");
$objPHPExcel->getActiveSheet()->SetCellValue("L10", "PRECIO VENTA FINAL");
$objPHPExcel->getActiveSheet()->SetCellValue("M10", "VENTA REAL");
$objPHPExcel->getActiveSheet()->SetCellValue("N10", "DIFERENCIA");


$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

$req_periodo = $bdd->prepare($sql_periodo);
$req_periodo->execute();
$gp_periodo = $req_periodo->fetch();



	$sql = "SELECT l.libro, l.id_grado, g.grado, m.materia, p.precio, p.tasa_compra_d, p.descuento_d, p.precio_venta_final, p.id_libro FROM libros l JOIN presupuestos p ON l.id=p.id_libro JOIN grados g ON l.id_grado=g.id JOIN materias m ON m.id=l.id_materia WHERE p.id_periodo='".$_POST["periodo"]."' AND p.definido='1' AND p.id_colegio='".$_POST["cole"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$adopciones = $req->fetchAll();

$conta=12;

foreach($adopciones as $adopcion) {

	 $sql_go = "SELECT a.id_grado_otro FROM areas_objetivas a WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["cole"]."' AND id_libro_eureka='".$adopcion["id_libro"]."'";
	$req_go = $bdd->prepare($sql_go);
	$req_go->execute();
	$go = $req_go->fetch();

	if ($go["id_grado_otro"] == 0) {

		$sq_gp = "SELECT  alumnos, paralelos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado='".$adopcion["id_grado"]."' AND id_periodo='".$_POST["periodo"]."'";
	}else {

		$sq_gp = "SELECT  alumnos, paralelos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado='".$go["id_grado_otro"]."' AND id_periodo='".$_POST["periodo"]."'";
	}

                           
    $req_gp = $bdd->prepare($sq_gp);
    $req_gp->execute();
    $gp = $req_gp->fetch();

   


    $tasa_compra=$adopcion["tasa_compra_d"] * 100;
    $comp_activos=$gp["alumnos"] * $adopcion["tasa_compra_d"];
    $comp_activos=floor($comp_activos);
    $descuento=$adopcion["descuento_d"] * 100;
    $venta_bruta=$adopcion["precio"] * $comp_activos;
    $precio_fact=$adopcion["precio"] - ($adopcion["precio"] * $adopcion["descuento_d"]);
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
	
	$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$gp[paralelos]");
	$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$gp[alumnos]");
	$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$tasa_compra");
	$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$comp_activos");
	$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$$adopcion[precio]");
	$objPHPExcel->getActiveSheet()->SetCellValue("H$conta", "$descuento");
	$objPHPExcel->getActiveSheet()->SetCellValue("I$conta", "$$venta_bruta");
	$objPHPExcel->getActiveSheet()->SetCellValue("J$conta", "$$precio_fact");
	$objPHPExcel->getActiveSheet()->SetCellValue("K$conta", "$$venta_estimada");
	$objPHPExcel->getActiveSheet()->SetCellValue("L$conta", "$$adopcion[precio_venta_final]");
	$objPHPExcel->getActiveSheet()->SetCellValue("M$conta", "$$venta_real");
	$objPHPExcel->getActiveSheet()->SetCellValue("N$conta", "$$diferencia");


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

  
    
$objPHPExcel->getActiveSheet()->SetCellValue("F5", "Potencial compra preescolar %");
$objPHPExcel->getActiveSheet()->getStyle('H5')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->SetCellValue("H5", "$p_pre");
$objPHPExcel->getActiveSheet()->SetCellValue("F6", "Potencial compra primaria %");
$objPHPExcel->getActiveSheet()->getStyle('H6')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->SetCellValue("H6", "$p_pri");
$objPHPExcel->getActiveSheet()->SetCellValue("F7", "Potencial venta bachillerato %");
$objPHPExcel->getActiveSheet()->getStyle('H7')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->SetCellValue("H7", "$p_sec");
$objPHPExcel->getActiveSheet()->SetCellValue("F8", "Promedio descuento %");
$objPHPExcel->getActiveSheet()->getStyle('H8')->applyFromArray($estilo_borde);
$objPHPExcel->getActiveSheet()->SetCellValue("H8", "$descuento_pactado");

$t_paralelos=array_sum($t_paralelos);
$t_alumnos=array_sum($t_alumnos);
$t_compradores=array_sum($t_compradores);
$t_venta_bruta=array_sum($t_venta_bruta);
$t_venta_estimada=array_sum($t_venta_estimada);
$t_venta_real=array_sum($t_venta_real);
$t_diferencia=array_sum($t_diferencia);

$objPHPExcel->getActiveSheet()->getStyle('A'.$conta.':N'.$conta)->applyFromArray($estilo_negrita);
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

$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "TOTAL VENTA");
$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$t_paralelos");
$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$t_alumnos");
$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$t_compradores");
$objPHPExcel->getActiveSheet()->SetCellValue("I$conta", "$$t_venta_bruta");
$objPHPExcel->getActiveSheet()->SetCellValue("K$conta", "$$t_venta_estimada");
$objPHPExcel->getActiveSheet()->SetCellValue("M$conta", "$$t_venta_real");
$objPHPExcel->getActiveSheet()->SetCellValue("N$conta", "$$t_diferencia");


$sql_rec = "SELECT  * FROM recursos WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["cole"]."'";
                           
$req_rec = $bdd->prepare($sql_rec);
$req_rec->execute();
$recurso = $req_rec->fetch();

$sql_canal = "SELECT  canal_venta FROM canales_venta WHERE id='".$recurso["id_canal"]."'";
                           
$req_canal = $bdd->prepare($sql_canal);
$req_canal->execute();
$canal = $req_canal->fetch();

$conta1=$conta + 2;
$conta2=$conta1 + 1;

$conta3=$conta2 + 2;
$conta4=$conta3 + 1;

$conta5=$conta4+ 2;

$conta6=$conta5 + 2;
$conta7=$conta6 + 1;

$conta8=$conta7 + 4;

$objPHPExcel->getActiveSheet()->getStyle('A'.$conta1.':H'.$conta1)->applyFromArray($estilo_negrita);

$objPHPExcel->getActiveSheet()->SetCellValue("A$conta1", "RECURSO ENTREGADO");
$objPHPExcel->getActiveSheet()->SetCellValue("A$conta2", "$recurso[recurso]");
$objPHPExcel->getActiveSheet()->SetCellValue("D$conta1", "REINTEGRO");
$objPHPExcel->getActiveSheet()->SetCellValue("D$conta2", "$recurso[reintegro]");
$objPHPExcel->getActiveSheet()->SetCellValue("H$conta1", "CANAL DE VENTA");
$objPHPExcel->getActiveSheet()->SetCellValue("H$conta2", "$canal[canal_venta]");

$objPHPExcel->getActiveSheet()->getStyle('A'.$conta3.':H'.$conta3)->applyFromArray($estilo_negrita);

$objPHPExcel->getActiveSheet()->SetCellValue("A$conta3", "VALOR RECURSO");
$objPHPExcel->getActiveSheet()->SetCellValue("A$conta4", "$recurso[valor_recurso]");
$objPHPExcel->getActiveSheet()->SetCellValue("D$conta3", "VALOR REINTEGRO");
$objPHPExcel->getActiveSheet()->SetCellValue("D$conta4", "$recurso[valor_reintegro]");
$objPHPExcel->getActiveSheet()->SetCellValue("H$conta3", "DESCRIPCION");
$objPHPExcel->getActiveSheet()->SetCellValue("H$conta4", "$recurso[descripcion_canal]");

$objPHPExcel->getActiveSheet()->getStyle('A'.$conta5)->applyFromArray($estilo_negrita);

$objPHPExcel->getActiveSheet()->SetCellValue("A$conta5", "FECHA: $recurso[fecha]");

$objPHPExcel->getActiveSheet()->mergeCells('A'.$conta6.':L'.$conta7);
$objPHPExcel->getActiveSheet()->SetCellValue("A$conta6", "OBSERVACIONES: $recurso[observaciones]");

$objPHPExcel->getActiveSheet()->mergeCells('B'.$conta8.':D'.$conta8);
$objPHPExcel->getActiveSheet()->mergeCells('F'.$conta8.':H'.$conta8);
$objPHPExcel->getActiveSheet()->mergeCells('J'.$conta8.':L'.$conta8);

$objPHPExcel->getActiveSheet()->getStyle('B'.$conta8.':J'.$conta8)->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('B'.$conta8.':J'.$conta8)->applyFromArray($estilo_centrar);

$objPHPExcel->getActiveSheet()->SetCellValue("B$conta8", "FIRMA ASESOR");
$objPHPExcel->getActiveSheet()->SetCellValue("F$conta8", "FIRMA GERENTE P Y V");
$objPHPExcel->getActiveSheet()->SetCellValue("J$conta8", "FIRMA GERENTE EUREKA");

$objPHPExcel->getActiveSheet()->getStyle('A1:N'.$conta8)->applyFromArray($estilo_fuente);

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
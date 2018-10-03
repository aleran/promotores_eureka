<?php
require_once("../php/aut.php");
include("../conexion/bdd.php");
include("../lib/PHPExcel.php");

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Ing. Alejandro Rangel");
$objPHPExcel->getProperties()->setTitle("Reporte de presupuesto");
$objPHPExcel->createSheet(0);
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Reporte de presupuesto");
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

	

$objPHPExcel->getActiveSheet()->getStyle("A3:I3")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);
//centrar
$estilo = array( 
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

$objPHPExcel->getActiveSheet()->getStyle("G6")->applyFromArray($estilo);

$objPHPExcel->getActiveSheet()->getStyle("A7:I7")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);


	$sql = "SELECT c.id, c.colegio FROM presupuestos p JOIN colegios c ON c.id=p.id_colegio WHERE p.id_periodo='".$_POST["periodo"]."' GROUP BY c.id";
	$req = $bdd->prepare($sql);
	$req->execute();
	$colegios = $req->fetchAll();


$cols=["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
$conta_cols=1;
$coles=[];
foreach($colegios as $colegio) {

	
	//if ($presupuesto["precio"] != 0) {
		
		/*$sq_gp = "SELECT  alumnos FROM grados_paralelos WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_grado='".$presupuesto["id_grado"]."' AND id_periodo='".$_POST["periodo"]."'";
														
		$req_gp = $bdd->prepare($sq_gp);
		$req_gp->execute();
		$gp = $req_gp->fetch();
		
		$tasa_c= $presupuesto["tasa_compra"] * 100;
		$alumnos_tasa= floor($gp["alumnos"] * $presupuesto["tasa_compra"]);
		$descuento= $presupuesto["descuento"] * 100;
		$precio_neto= $presupuesto["precio"] - ($presupuesto["precio"] * $presupuesto["descuento"]);
		$venta_potencial= $precio_neto * floor($gp["alumnos"] * $presupuesto["tasa_compra"]);
		$venta_potencial= number_format($venta_potencial,2,",", ".");
		$total_alumnos_tasa[]=$alumnos_tasa;
		$total_venta[]=$venta_potencial;
		$total_alumnos[]=$gp["alumnos"];*/

		$objPHPExcel->getActiveSheet()->SetCellValue($cols[$conta_cols]."9", "$colegio[colegio]");

		$conta_cols++;
		$coles[]=$colegio["id"];

	
	//}
	
}

$libs=[];

foreach ($coles as $cole => $valor) {

	$sql = "SELECT l.libro FROM presupuestos p JOIN libros l ON p.id_libro=l.id WHERE p.id_periodo='".$_POST["periodo"]."' AND p.id_colegio='".$valor."' AND p.precio !=0";
	$req = $bdd->prepare($sql);
	$req->execute();
	$libros = $req->fetchAll();

	foreach($libros as $libro) {

		$libs[]=$libro["libro"];

	}

	

}

$libs=array_unique($libs);
$conta=11;

foreach ($libs as $libr => $lib) {

	$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$lib");
	$conta++;

}

$sql = "SELECT l.id as idlibro, l.libro, p.id_colegio, l.id_grado, p.precio, p.tasa_compra, p.descuento FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='".$_POST["periodo"]."' AND p.precio !=0";
	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

$conta_cols_p=1;
$conta_p=11;

foreach($presupuestos as $presupuesto) {

	$sq_gp = "SELECT  alumnos FROM grados_paralelos WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_grado='".$presupuesto["id_grado"]."' AND id_periodo='".$_POST["periodo"]."'";
														
		$req_gp = $bdd->prepare($sq_gp);
		$req_gp->execute();
		$gp = $req_gp->fetch();
		
		$tasa_c= $presupuesto["tasa_compra"] * 100;
		$alumnos_tasa= floor($gp["alumnos"] * $presupuesto["tasa_compra"]);
		$descuento= $presupuesto["descuento"] * 100;
		$precio_neto= $presupuesto["precio"] - ($presupuesto["precio"] * $presupuesto["descuento"]);
		$venta_potencial= $precio_neto * floor($gp["alumnos"] * $presupuesto["tasa_compra"]);
		$venta_potencial= number_format($venta_potencial,2,",", ".");
		$total_alumnos_tasa[]=$alumnos_tasa;
		$total_venta[]=$venta_potencial;
		$total_alumnos[]=$gp["alumnos"];

		if (in_array($presupuesto["id_colegio"], $coles)) {

			if (in_array($presupuesto["libro"], $libs)){

				$objPHPExcel->getActiveSheet()->SetCellValue($cols[$conta_cols_p].$conta_p, "$gp[alumnos]");


				$conta_cols_p++;
				if ($conta_cols ==$conta_cols_p) {
					
					$conta_p++;
					$conta_cols_p= ($conta_cols_p - $conta_cols_p) + 1;
				}

			}
		}
		

}




/*$sum_ventas=array_sum($total_venta);
$sum_ta=array_sum($total_alumnos_tasa);
$sum_alumnos=array_sum($total_alumnos);

$porcentaje= ($sum_ta / $sum_alumnos) *100;
$porcentaje= number_format($porcentaje,2);*/

//$sum_descuento=array_sum($total_descuento);
//$cantidad_descuento=sizeof($total_descuento);
//$promedio_descuento=$sum_descuento/$cantidad_descuento;
//$promedio_descuento=number_format($promedio_descuento,2);

/*$objPHPExcel->getActiveSheet()->SetCellValue("G8", "$sum_alumnos");
$objPHPExcel->getActiveSheet()->SetCellValue("H8", "$sum_ta");
$objPHPExcel->getActiveSheet()->SetCellValue("I8", "$porcentaje");*/

foreach (range('A', 'Z') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
foreach (range('AA', 'ZZ') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Reporte_presupuesto.xlsx"');
$objWriter->save('php://output');
?>
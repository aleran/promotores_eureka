<script src="../assets/js/jquery-2.1.4.min.js"></script>
<?php
require_once("../php/aut.php");
include("../conexion/bdd.php");



	$sql = "SELECT c.id, c.colegio FROM presupuestos p JOIN colegios c ON c.id=p.id_colegio WHERE p.id_periodo='2' GROUP BY c.id";
	$req = $bdd->prepare($sql);
	$req->execute();
	$colegios = $req->fetchAll();



$conta_cols=1;
$coles=[];
echo "<table border='1'>
		<thead>
			<th>libros</th>
			<th>Colegios</th>

		</thead>
		<tbody>
			<tr><td></td>";
foreach($colegios as $colegio) {

	echo "<td id='".$colegio["id"]."' class='coles'>".$colegio["colegio"]."</td>";

	if ($colegio === end($colegios)) {
		echo "</tr>";

	}

	$sql = "SELECT l.id,l.libro FROM presupuestos p JOIN libros l ON l.id=p.id_libro WHERE p.id_periodo='2' AND p.id_colegio='".$colegio["id"]."' GROUP BY l.id";
	$req = $bdd->prepare($sql);
	$req->execute();
	$libros = $req->fetchAll();

	foreach ($libros as $libro) {

		echo $libro["libro"];
	}

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

		

		$conta_cols++;
		$coles[]=$colegio["id"];

	
	//}
	
}
$libs=[];

foreach ($coles as $cole => $valor) {

	$sql = "SELECT l.libro FROM presupuestos p JOIN libros l ON p.id_libro=l.id WHERE p.id_periodo='2' AND p.id_colegio='".$valor."' AND p.precio !=0";
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

	//echo "<tr><td>".$lib."</td></tr>";
	
	//$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$lib");
	$conta++;

}


$sql = "SELECT l.id as idlibro, l.libro, p.id_colegio, l.id_grado, p.precio, p.tasa_compra, p.descuento FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='2' AND p.precio !=0";
	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

$conta_cols_p=1;
$conta_p=11;



foreach($presupuestos as $presupuesto) {

	$sq_gp = "SELECT  alumnos FROM grados_paralelos WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_grado='".$presupuesto["id_grado"]."' AND id_periodo='2'";
														
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



		//$objPHPExcel->getActiveSheet()->SetCellValue($cols[$conta_cols_p].$conta_p, "$gp[alumnos]");
		
		$conta_cols_p++;
		if ($conta_cols ==$conta_cols_p) {
					
			$conta_p++;
			$conta_cols_p= ($conta_cols_p - $conta_cols_p) + 1;
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

?>
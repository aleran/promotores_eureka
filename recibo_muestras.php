<?php
	require_once("php/aut.php");
	include("conexion/bdd.php");
	require_once 'lib/dompdf/lib/html5lib/Parser.php';
	require_once 'lib/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
	require_once 'lib/dompdf/lib/php-svg-lib/src/autoload.php';
	require_once 'lib/dompdf/src/Autoloader.php';

	Dompdf\Autoloader::register();

	use Dompdf\Dompdf;


// instantiate and use the dompdf class
	$dompdf = new Dompdf();

	if (isset($_GET["entregado"])) {

		$sql1 = "SELECT  u.nombres, u.apellidos, c.colegio FROM muestreos pe  JOIN usuarios u ON pe.id_usuario=u.id JOIN colegios c ON pe.id_colegio=c.id  WHERE pe.id='".$_GET["entregado"]."'";
	}else{

		$sql1 = "SELECT  u.nombres, u.apellidos, c.colegio FROM muestreos pe  JOIN usuarios u ON pe.id_usuario=u.id JOIN colegios c ON pe.id_colegio=c.id  WHERE pe.id='".$_GET["imprimir"]."'";
	}
	

	$req1 = $bdd->prepare($sql1);
	$req1->execute();

	$datos = $req1->fetch();
	$nombre_completo= $datos["nombres"]." ".$datos["apellidos"];

	if (isset($_GET["entregado"])) {

	$sql = "SELECT  l.libro, lp.cantidad_aprob FROM muestreos pe JOIN libros_muestreos lp ON lp.cod_muestreo=pe.codigo JOIN libros l ON l.id=lp.id_libro  WHERE pe.id='".$_GET["entregado"]."'  GROUP BY l.id";
	}else {

		$sql = "SELECT  l.libro, lp.cantidad_aprob FROM muestreos pe JOIN libros_muestreos lp ON lp.cod_muestreo=pe.codigo JOIN libros l ON l.id=lp.id_libro  WHERE pe.id='".$_GET["imprimir"]."'  GROUP BY l.id";

	}
	$req = $bdd->prepare($sql);
	$req->execute();

	$libros = $req->fetchAll();

		if (isset($_GET["entregado"])) {
		
			$html='<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
						<div class="container">
							<img src="../assets/images/logo_eureka.png" width=150>
							<br><center><h4>Muestreo No. '.$_GET["entregado"].'</h4></center><br>
								<table class="table table-bordered">
			 						<tbody>
										<tr><td><b>Asesor</b></td><td>'.$nombre_completo.'</td><td><b>Colegio</b></td><td>'.$datos["colegio"].'</td></tr>

										<tr><td><b>Teléfono</b></td><td>3115274827</td><td><b>Fecha</b></td><td>'.date("Y-m-d").'</td></tr>

			 						</tbody>
								</table>';

		}else{

			$html='<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
						<div class="container">
							<img src="assets/images/logo_eureka.png" width=150>
							<br><center><h4>Muestreo No. '.$_GET["imprimir"].'</h4></center><br>
								<table class="table table-bordered">
			 						<tbody>
										<tr><td><b>Asesor</b></td><td>'.$nombre_completo.'</td><td><b>Colegio</b></td><td>'.$datos["colegio"].'</td></tr>

										<tr><td><b>Teléfono</b></td><td>3115274827</td><td><b>Fecha</b></td><td>'.date("Y-m-d").'</td></tr>

			 						</tbody>
								</table>';
		}

		$html.='<center>Nos complace entregarle las siguientes muestas</center><br>
					<table class="table table-bordered">
					<thead>
						<th>Título</th>
						<th>Cantidad</th>
					</thead>
					<tbody>';
		foreach($libros as $libro) {
			$total_cantidad_aprob[]=$libro["cantidad_aprob"];
			$html.='<tr><td>'.$libro["libro"].'</td><td>'.$libro["cantidad_aprob"].'</td></tr>';

		}

		$total_c_aprob=array_sum($total_cantidad_aprob);

		$html.='<tr><td><b>Total cantidades</b><td><b>'.$total_c_aprob.'</b></td></tr></tbody></table>';

		$html.='Elaborado por:____________ &nbsp&nbsp&nbsp&nbsp Recibido por:___________';
					
						


	$dompdf->set_option('isHtml5ParserEnabled', true);

	$dompdf->loadHtml($html);

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('letter');

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream('recibo_muestras');

?>
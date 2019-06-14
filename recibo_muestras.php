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

		$sql1 = "SELECT  u.nombres, u.apellidos,u.telefono, u.correo, c.colegio FROM muestreos pe  JOIN usuarios u ON pe.id_usuario=u.id JOIN colegios c ON pe.id_colegio=c.id  WHERE pe.id='".$_GET["entregado"]."'";
	}else{

		$sql1 = "SELECT  u.nombres, u.apellidos,u.telefono, u.correo, c.colegio FROM muestreos pe  JOIN usuarios u ON pe.id_usuario=u.id JOIN colegios c ON pe.id_colegio=c.id  WHERE pe.id='".$_GET["imprimir"]."'";
	}
	

	$req1 = $bdd->prepare($sql1);
	$req1->execute();

	$datos = $req1->fetch();
	$nombre_completo= $datos["nombres"]." ".$datos["apellidos"];

	if (isset($_GET["entregado"])) {

	$sql = "SELECT UPPER(l.libro) as libro, l.id_grado, lp.cantidad_aprob,lp.id_grado_otro, g.grado, m.materia, pe.codigo FROM muestreos pe JOIN libros_muestreos lp ON lp.cod_muestreo=pe.codigo JOIN libros l ON l.id=lp.id_libro JOIN materias m ON m.id=l.id_materia JOIN grados g ON g.id=l.id_grado  WHERE pe.id='".$_GET["entregado"]."' AND lp.cantidad_aprob > 0 GROUP BY l.id";
	}else {

		$sql = "SELECT UPPER(l.libro) as libro, l.id_grado, lp.cantidad_aprob,lp.id_grado_otro, g.grado, m.materia, pe.codigo FROM muestreos pe JOIN libros_muestreos lp ON lp.cod_muestreo=pe.codigo JOIN libros l ON l.id=lp.id_libro JOIN materias m ON m.id=l.id_materia JOIN grados g ON g.id=l.id_grado  WHERE pe.id='".$_GET["imprimir"]."' AND lp.cantidad_aprob > 0  GROUP BY l.id";

	}
	$req = $bdd->prepare($sql);
	$req->execute();

	$libros = $req->fetchAll();

		if (isset($_GET["entregado"])) {
		
			$html='<meta charset="utf-8" />
					<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
						<style>
							body{
								font-size: 11px;
							}

							@page {
					            margin: 0.9em;
					            
      						  }

							.table > thead > tr > th,
							.table > tbody > tr > th,
							.table > tfoot > tr > th,
							.table > thead > tr > td,
							.table > tbody > tr > td,
							.table > tfoot > tr > td {
							  padding: 1px;
							  line-height: 1.42857143;
							  vertical-align: top;
							  border-top: 1px solid #dddxddd;
							}

							
						</style>
						<div class="container">
							<img src="../assets/images/logo_eureka.png" width=80>
							<br><center style="margin-top: -60px"><h4>Muestra Profesional para Evaluación<span class="pull-right">No. '.$_GET["entregado"].'</span></h4></center>
								<table class="table table-bordered">
			 						<tbody>
										<tr>
											<td><b>Colegio:</b> '.$datos["colegio"].'</td>
											<td><b>Fecha:</b> '.date("Y-m-d").'</td>
										</tr>

			 						</tbody>
								</table>';

		}else{

			$html='<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
					<style>
							*{
								font-size: 12px;
							}

							@page {
					            margin: 0.9em;
					            
      						  }

							.table > thead > tr > th,
							.table > tbody > tr > th,
							.table > tfoot > tr > th,
							.table > thead > tr > td,
							.table > tbody > tr > td,
							.table > tfoot > tr > td {
							  padding: 1px;
							  line-height: 1.42857143;
							  vertical-align: top;
							  border-top: 1px solid #dddxddd;
							}

							
						</style>
						<div class="container">
							<img src="assets/images/logo_eureka.png" width=80>
							<br><center style="margin-top: -60px"><h4>Muestra Profesional para Evaluación <span class="pull-right">No. '.$_GET["imprimir"].'</span></h4></center>
								<table class="table table-bordered">
			 						<tbody>
										<tr>
											<td><b>Colegio:</b> '.$datos["colegio"].'</td>
											<td><b>Fecha:</b> '.date("Y-m-d").'</td>
										</tr>

			 						</tbody>
								</table>';
		}

		$html.='<center style="margin-top: -15px">Estimado docente: Nos complace hacer entrega de nuestro material de muestras para su revisión y análisis</center>
					<table class="table table-bordered" style="margin-top: 5px">
					<thead>
						<th><center>Título</center></th>
						<th><center>Materia</center></th>
						<th><center>Grado</center></th>
						<th><center>Cantidad</center></th>
					</thead>
					<tbody>';
		foreach($libros as $libro) {

			if ($libro["id_grado_otro"] !=0) {
							
				$sql_go = "SELECT grado FROM grados WHERE id='".$libro["id_grado_otro"]."'";

				$req_go = $bdd->prepare($sql_go);
				$req_go->execute();
				$go = $req_go->fetch();

			}

			$total_cantidad_aprob[]=$libro["cantidad_aprob"];

			$html.='<tr>
						<td>'.$libro["libro"].'</td>
						<td><center>'.$libro["materia"].'</center></td>';

						if ($libro["id_grado_otro"] ==0) {

							$html.='<td><center>'.$libro["grado"].'</center></td>';
						}else{
							$html.='<td><center>'.$go["grado"].'</center></td>';
						}
						$html.='<td><center>'.$libro["cantidad_aprob"].'</center></td>
					</tr>';

		}

		$total_c_aprob=array_sum($total_cantidad_aprob);

		$html.='<tr><td></td><td></td><td><b><center>Total</center></b><td><center><b>'.$total_c_aprob.'</b></center></td></tr></tbody></table>';

		if (isset($_GET["entregado"])) {
			$sql_trab = "SELECT nombre, cargo, telefono, email, area FROM plan_trabajo p JOIN muestreos m ON m.codigo=p.cod_muestreo JOIN trabajadores_colegios t ON t.codigo=p.cod_profesor WHERE m.id='".$_GET["entregado"]."'";
		}else{

			$sql_trab = "SELECT nombre, cargo, telefono, email, area FROM plan_trabajo p JOIN muestreos m ON m.codigo=p.cod_muestreo JOIN trabajadores_colegios t ON t.codigo=p.cod_profesor WHERE m.id='".$_GET["imprimir"]."'";

		}

		$req_trab= $bdd->prepare($sql_trab);
		$req_trab->execute();
		$profesor = $req_trab->fetch();

		$html.='<table class="table">
				 	<tbody>
						<tr>
							<td><b>Docente:</b> '.$profesor["nombre"].'</td><td><b>Teléfono:</b> '.$profesor["telefono"].'</td> <td><b>Correo:</b> '.$profesor["telefono"].'</td>
						</tr>
					
					</tbody>
				</table>';


		$html.='<table class="table" style="margin-top: -15px">
				 	<tbody>
						<tr>
							<td><b>Ascesor:</b> '.$nombre_completo.'</td><td><b>Teléfono:</b> '.$datos["telefono"].'</td> <td><b>Correo:</b> '.$datos["correo"].'</td>
						</tr>
					
					</tbody>
				</table>';

		$html.='Recibido por: ____________________________________________________________________________________________________<br><br><br>';
					
		$html.='<center>Contactenos: info@eurekalibros.com.co CRA 21 # 37-2 PBX: 7031014 Cel: 3103225677</center>';		


	$dompdf->set_option('isHtml5ParserEnabled', true);

	$dompdf->loadHtml($html);

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('letter');
	//$dompdf->setPaper('letter');

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream('recibo_muestras');

?>
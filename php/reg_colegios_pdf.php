<?php
	require_once("aut.php");
	include("../conexion/bdd.php");
	require_once '../lib/dompdf/lib/html5lib/Parser.php';
	require_once '../lib/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
	require_once '../lib/dompdf/lib/php-svg-lib/src/autoload.php';
	require_once '../lib/dompdf/src/Autoloader.php';

	Dompdf\Autoloader::register();

	use Dompdf\Dompdf;


// instantiate and use the dompdf class
	$dompdf = new Dompdf();

	$sql = "SELECT id, codigo, colegio, direccion, barrio,telefono, web, telefono, cumpleaños, cod_zona FROM colegios WHERE id='".$_POST["cole"]."'";

	$req = $bdd->prepare($sql);
	$req->execute();

	$colegio = $req->fetch();

	$sql_usuario = "SELECT CONCAT(nombres, ' ', apellidos) as promotor FROM usuarios WHERE cod_zona='".$colegio["cod_zona"]."'";

	$req_usuario = $bdd->prepare($sql_usuario);
	$req_usuario->execute();
	$usuario = $req_usuario->fetch();

	$html='<style>

				*{
					font-size: 11px;
				}

				.prescolar {
				background-color: #E4F61F;
				color: #000;
				text-align: center;
			}
			.primaria {
				background-color: #2AB510;
				color: #000;
				text-align: center;
			}
			.bachillerato {
				background-color: #438EB9;
				color: #000;
				text-align: center;
			}
			.poblacion tr td {
				text-align: center;
			}
			</style>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
						<div class="container">
							<img src="../assets/images/logo_eureka.png" width=100>
							<br><center><h4>REGISTRO GENERAL DE PLANTELES</h4></center><br>
								<table class="table table-bordered">
			 						<tbody>
										<tr class="info"><td class="text-center" colspan="2">INFORMACIÓN BÁSICA</td></tr>
										<tr><td class="" colspan="2"><b>Nombre de la institución:</b> '.$colegio["colegio"].'</td></tr>
										<tr><td><b>Código interno:</b> '.$colegio["codigo"].'</td><td><b>Dirección:</b> '.$colegio["direccion"].'</td></tr>
										<tr><td><b>Barrio:</b> '.$colegio["barrio"].'</td><td><b>Representante:</b> '.$usuario["promotor"].'</td></tr>
										<tr><td><b>Teléfono:</b> '.$colegio["telefono"].'</td><td><b>Página web:</b> '.$colegio["web"].'</td></tr>
										<tr><td colspan="2"><b>Cumpleaños del colegio:</b> '.$colegio["cumpleaños"].'</td></tr>

			 						</tbody>
								</table>';

	$html.='<table class="table table-bordered table-striped">
				<tbody>';


	$sql = "SELECT t.nombre, t.telefono, t.email, t.cumpleaños, t.cargo as id_cargo,c.cargo, t.area FROM trabajadores_colegios t JOIN cargos c ON t.cargo=c.id  WHERE t.nombre !='' AND t.cargo !=6 AND t.id_colegio='".$_POST["cole"]."' GROUP BY t.nombre, t.cargo ORDER by t.cargo";

	$req = $bdd->prepare($sql);
	$req->execute();

	$direcs = $req->fetchAll();

	foreach($direcs as $direc) {

		if ($direc["id_cargo"] != 5) {

			$html.='<tr>
					<td><b>'.$direc["cargo"].'</b>: '.$direc["nombre"].'</td><td><b>Celular:</b> '.$direc["telefono"].'</td>
				</tr>
				<tr>
					<td><b>E-mail:</b> '.$direc["email"].'</td>
					<td><b>Fecha de cumpleaños:</b> '.$direc["cumpleaños"].'</td>
				</tr>';
			
		}else{

			$sql_m = "SELECT materia FROM materias WHERE id='".$direc["area"]."'";

			$req_m = $bdd->prepare($sql_m);
			$req_m->execute();
			$materia = $req_m->fetch();

			$html.='<tr>
					<td><b>'.$direc["cargo"].' '.$materia["materia"].'</b>: '.$direc["nombre"].'</td><td><b>Celular:</b> '.$direc["telefono"].'</td>
				</tr>
				<tr>
					<td><b>E-mail:</b> '.$direc["email"].'</td>
					<td><b>Fecha de cumpleaños:</b> '.$direc["cumpleaños"].'</td>
				</tr>';

		}

		
	}
	$html.='</tbody></table>';

	$sql = "SELECT id, id_periodo FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' ORDER BY id_periodo DESC";

	$req = $bdd->prepare($sql);
	$req->execute();

	$num = $req->rowCount();

	$ultimo_periodo=$req->fetch();

	if ($ultimo_periodo["id_periodo"] == $_POST['periodo']){

		$sql_pre = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=1 ORDER BY id_periodo DESC";
		$req_pre = $bdd->prepare($sql_pre);
		$req_pre->execute();
		$gp_pre = $req_pre->fetch();

		$sql_jar = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=2 ORDER BY id_periodo DESC";
		$req_jar = $bdd->prepare($sql_jar);
		$req_jar->execute();
		$gp_jar = $req_jar->fetch();

		$sql_tra = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=3  ORDER BY id_periodo DESC";
		$req_tra = $bdd->prepare($sql_tra);
		$req_tra->execute();
		$gp_tra = $req_tra->fetch();

		$sql_1 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=4 ORDER BY id_periodo DESC";
		$req_1 = $bdd->prepare($sql_1);
		$req_1->execute();
		$gp_1 = $req_1->fetch();

		$sql_2 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=5  ORDER BY id_periodo DESC";
		$req_2 = $bdd->prepare($sql_2);
		$req_2->execute();
		$gp_2 = $req_2->fetch();

		$sql_3 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=6 ORDER BY id_periodo DESC";
		$req_3 = $bdd->prepare($sql_3);
		$req_3->execute();
		$gp_3 = $req_3->fetch();

		$sql_4 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=7 ORDER BY id_periodo DESC";
		$req_4 = $bdd->prepare($sql_4);
		$req_4->execute();
		$gp_4 = $req_4->fetch();

		$sql_5 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=8 ORDER BY id_periodo DESC";
		$req_5 = $bdd->prepare($sql_5);
		$req_5->execute();
		$gp_5 = $req_5->fetch();

		$sql_6 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=9 ORDER BY id_periodo DESC";
		$req_6 = $bdd->prepare($sql_6);
		$req_6->execute();
		$gp_6 = $req_6->fetch();

		$sql_7 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=10 ORDER BY id_periodo DESC";
		$req_7 = $bdd->prepare($sql_7);
		$req_7->execute();
		$gp_7 = $req_7->fetch();

		$sql_8 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=11 ORDER BY id_periodo DESC";
		$req_8 = $bdd->prepare($sql_8);
		$req_8->execute();
		$gp_8 = $req_8->fetch();

		$sql_9 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=12 ORDER BY id_periodo DESC";
		$req_9 = $bdd->prepare($sql_9);
		$req_9->execute();
		$gp_9 = $req_9->fetch();

		$sql_10 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=13 ORDER BY id_periodo DESC";
		$req_10 = $bdd->prepare($sql_10);
		$req_10->execute();
		$gp_10 = $req_10->fetch();

		$sql_11 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=14 ORDER BY id_periodo DESC";
		$req_11 = $bdd->prepare($sql_11);
		$req_11->execute();
		$gp_11 = $req_11->fetch();

		$paralelos_prescolar=$gp_pre["paralelos"] + $gp_jar["paralelos"] + $gp_tra["paralelos"];

		if ($_SESSION["pais"]==2) {

			$paralelos_pri=$gp_1["paralelos"] + $gp_2["paralelos"] + $gp_3["paralelos"] + $gp_4["paralelos"] + $gp_5["paralelos"] + $gp_6["paralelos"];

			$paralelos_bach=$gp_7["paralelos"] + $gp_8["paralelos"] + $gp_9["paralelos"] + $gp_10["paralelos"] + $gp_11["paralelos"];
		}

		else {

			$paralelos_pri=$gp_1["paralelos"] + $gp_2["paralelos"] + $gp_3["paralelos"] + $gp_4["paralelos"] + $gp_5["paralelos"];

			$paralelos_bach=$gp_6["paralelos"] + $gp_7["paralelos"] + $gp_8["paralelos"] + $gp_9["paralelos"] + $gp_10["paralelos"] + $gp_11["paralelos"];

		}
							
		}else{

			$sql_pre = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=1 AND id_periodo='".$_POST['periodo']."'";
			$req_pre = $bdd->prepare($sql_pre);
			$req_pre->execute();
			$gp_pre = $req_pre->fetch();

			$sql_jar = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=2 AND id_periodo='".$_POST['periodo']."'";
			$req_jar = $bdd->prepare($sql_jar);
			$req_jar->execute();
			$gp_jar = $req_jar->fetch();

			$sql_tra = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=3  AND id_periodo='".$_POST['periodo']."'";
			$req_tra = $bdd->prepare($sql_tra);
			$req_tra->execute();
			$gp_tra = $req_tra->fetch();

			$sql_1 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=4  AND id_periodo='".$_POST['periodo']."'";
			$req_1 = $bdd->prepare($sql_1);
			$req_1->execute();
			$gp_1 = $req_1->fetch();

			$sql_2 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=5  AND id_periodo='".$_POST['periodo']."'";
			$req_2 = $bdd->prepare($sql_2);
			$req_2->execute();
			$gp_2 = $req_2->fetch();

			$sql_3 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=6 AND id_periodo='".$_POST['periodo']."'";
			$req_3 = $bdd->prepare($sql_3);
			$req_3->execute();
			$gp_3 = $req_3->fetch();

			$sql_4 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=7  AND id_periodo='".$_POST['periodo']."'";
			$req_4 = $bdd->prepare($sql_4);
			$req_4->execute();
			$gp_4 = $req_4->fetch();

			$sql_5 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=8  AND id_periodo='".$_POST['periodo']."'";
			$req_5 = $bdd->prepare($sql_5);
			$req_5->execute();
			$gp_5 = $req_5->fetch();

			$sql_6 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=9  AND id_periodo='".$_POST['periodo']."'";
			$req_6 = $bdd->prepare($sql_6);
			$req_6->execute();
			$gp_6 = $req_6->fetch();

			$sql_7 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=10 AND  id_periodo='".$_POST['periodo']."'";
			$req_7 = $bdd->prepare($sql_7);
			$req_7->execute();
			$gp_7 = $req_7->fetch();

			$sql_8 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=11 AND  id_periodo='".$_POST['periodo']."'";
			$req_8 = $bdd->prepare($sql_8);
			$req_8->execute();
			$gp_8 = $req_8->fetch();

			$sql_9 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=12 AND id_periodo='".$_POST['periodo']."'";
			$req_9 = $bdd->prepare($sql_9);
			$req_9->execute();
			$gp_9 = $req_9->fetch();

			$sql_10 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=13 AND id_periodo='".$_POST['periodo']."'";
			$req_10 = $bdd->prepare($sql_10);
			$req_10->execute();
			$gp_10 = $req_10->fetch();

			$sql_11 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST['cole']."' AND id_grado=14 AND id_periodo='".$_POST['periodo']."'";
			$req_11 = $bdd->prepare($sql_11);
			$req_11->execute();
			$gp_11 = $req_11->fetch();

			$paralelos_prescolar=$gp_pre["paralelos"] + $gp_jar["paralelos"] + $gp_tra["paralelos"];

			if ($_SESSION["pais"]==2) {

				$paralelos_pri=$gp_1["paralelos"] + $gp_2["paralelos"] + $gp_3["paralelos"] + $gp_4["paralelos"] + $gp_5["paralelos"] + $gp_6["paralelos"];

				$paralelos_bach=$gp_7["paralelos"] + $gp_8["paralelos"] + $gp_9["paralelos"] + $gp_10["paralelos"] + $gp_11["paralelos"];
			}

			else {

				$paralelos_pri=$gp_1["paralelos"] + $gp_2["paralelos"] + $gp_3["paralelos"] + $gp_4["paralelos"] + $gp_5["paralelos"];

				$paralelos_bach=$gp_6["paralelos"] + $gp_7["paralelos"] + $gp_8["paralelos"] + $gp_9["paralelos"] + $gp_10["paralelos"] + $gp_11["paralelos"];

			}
			}

			$paralelos_global= $paralelos_pri + $paralelos_bach + $paralelos_prescolar;


			$alumnos_prescolar=$gp_pre["alumnos"] + $gp_jar["alumnos"] + $gp_tra["alumnos"];

			if ($_SESSION["pais"]==2) {

				$alumnos_pri=$gp_1["alumnos"] + $gp_2["alumnos"] + $gp_3["alumnos"] + $gp_4["alumnos"] + $gp_5["alumnos"]+ $gp_6["alumnos"];

				$alumnos_bach=$gp_7["alumnos"] + $gp_8["alumnos"] + $gp_9["alumnos"] + $gp_10["alumnos"] + $gp_11["alumnos"];
			}

			else {

				$alumnos_pri=$gp_1["alumnos"] + $gp_2["alumnos"] + $gp_3["alumnos"] + $gp_4["alumnos"] + $gp_5["alumnos"];

				$alumnos_bach=$gp_6["alumnos"] + $gp_7["alumnos"] + $gp_8["alumnos"] + $gp_9["alumnos"] + $gp_10["alumnos"] + $gp_11["alumnos"];
			}

			$alumnos_global= $alumnos_pri + $alumnos_bach + $alumnos_prescolar;


		$html.='<table class="table table-bordered  poblacion">
		<tr class="info"><td colspan="19">INFORMACIÓN DE POBLACIÓN</td></tr>
					<thead>
						<th>Grados:</th>
						<th class="prescolar">PRE</th>
						<th class="prescolar">JAR</th>
						<th class="prescolar">TRA</th>
						<th class="primaria">1</th>
						<th class="primaria">2</th>
						<th class="primaria">3</th>
						<th class="primaria">4</th>
						<th class="primaria">5</th>
						<th class="bachillerato">6</th>	
						<th class="bachillerato">7</th>
						<th class="bachillerato">8</th>
						<th class="bachillerato">9</th>
						<th class="bachillerato">10</th>
						<th class="bachillerato">11</th>
						<th class="prescolar">Total pre</th>
						<th class="primaria">Total pri</th>
						<th class="bachillerato">Total bach</th>
						<th>Global</th>
					</thead>
					<tbody>
						<tr><td>Paralelos</td><td>'.$gp_pre["paralelos"].'</td><td>'.$gp_jar["paralelos"].'</td><td>'.$gp_tra["paralelos"].'</td><td>'.$gp_1["paralelos"].'</td><td>'.$gp_2["paralelos"].'</td><td>'.$gp_3["paralelos"].'</td><td>'.$gp_4["paralelos"].'</td><td>'.$gp_5["paralelos"].'</td><td>'.$gp_6["paralelos"].'</td><td>'.$gp_7["paralelos"].'</td><td>'.$gp_8["paralelos"].'</td><td>'.$gp_9["paralelos"].'</td><td>'.$gp_10["paralelos"].'</td><td>'.$gp_11["paralelos"].'</td><td> '.$paralelos_prescolar.'</td><td>'.$paralelos_pri.'</td></td><td>'.$paralelos_bach.'</td><td>'.$paralelos_global.'</td></tr>
							
							<tr><td>Alumnos</td><td>'.$gp_pre["alumnos"].'</td><td>'.$gp_jar["alumnos"].'</td><td>'.$gp_tra["alumnos"].'</td><td>'.$gp_1["alumnos"].'</td><td>'.$gp_2["alumnos"].'</td><td>'.$gp_3["alumnos"].'</td><td>'.$gp_4["alumnos"].'</td><td>'.$gp_5["alumnos"].'</td><td>'.$gp_6["alumnos"].'</td><td>'.$gp_7["alumnos"].'</td><td>'.$gp_8["alumnos"].'</td><td>'.$gp_9["alumnos"].'</td><td>'.$gp_10["alumnos"].'</td><td>'.$gp_11["alumnos"].'</td></td></td><td>'.$alumnos_prescolar.'</td><td>'.$alumnos_pri.'</td></td><td>'.$alumnos_bach.'</td><td>'.$alumnos_global.'</td></tr>
					</tbody>
				</table>';
					
						


	$dompdf->set_option('isHtml5ParserEnabled', true);

	$dompdf->loadHtml($html);

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('letter');

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream('registro_colegio');

?>
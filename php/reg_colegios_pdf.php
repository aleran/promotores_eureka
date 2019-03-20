<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Registro de planteles</title>

<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
<style>
	.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 2px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #dddxddd;
}
</style>
<?php
	require_once("aut.php");
	include("../conexion/bdd.php");
	





	$sql = "SELECT id, codigo, colegio, direccion, barrio,telefono, web, telefono, cumpleaños, cod_zona FROM colegios WHERE id='".$_POST["cole"]."'";

	$req = $bdd->prepare($sql);
	$req->execute();

	$colegio = $req->fetch();

	$sql_usuario = "SELECT CONCAT(nombres, ' ', apellidos) as promotor FROM usuarios WHERE cod_zona='".$colegio["cod_zona"]."'";

	$req_usuario = $bdd->prepare($sql_usuario);
	$req_usuario->execute();
	$usuario = $req_usuario->fetch();

	$sql_periodo = "SELECT periodo FROM periodos WHERE id='".$_POST["periodo"]."'";

	$req_periodo = $bdd->prepare($sql_periodo);
	$req_periodo->execute();
	$periodo = $req_periodo->fetch();

	echo'<style>

				*{
					font-size: 12px;
				}

				.prescolar {
				
				color: #000;
				text-align: center;
			}
			.primaria {
				
				color: #000;
				text-align: center;
			}
			.bachillerato {
				
				color: #000;
				text-align: center;
			}
			.poblacion tr td {
				text-align: center;
			}
			</style>
	
	<script src="../assets/js/jquery-2.1.4.min.js"></script>
						<div class="container">
							<img src="../assets/images/logo_eureka.png" width=100>
							<br><center><h4>REGISTRO GENERAL DE PLANTELES -- '.$periodo["periodo"].'</h4></center><br>
								<table class="table table-bordered">
			 						<tbody>
										<tr ><td class="text-center" colspan="2"><b>INFORMACIÓN BÁSICA</b></td></tr>
										<tr><td class="" colspan="2"><b>Nombre de la institución:</b> '.$colegio["colegio"].'</td></tr>
										<tr><td><b>Código interno:</b> '.$colegio["codigo"].'</td><td><b>Dirección:</b> '.$colegio["direccion"].'</td></tr>
										<tr><td><b>Barrio:</b> '.$colegio["barrio"].'</td><td><b>Representante:</b> '.$usuario["promotor"].'</td></tr>
										<tr><td><b>Teléfono:</b> '.$colegio["telefono"].'</td><td><b>Página web:</b> '.$colegio["web"].'</td></tr>
										<tr><td colspan="2"><b>Cumpleaños del colegio:</b> '.$colegio["cumpleaños"].'</td></tr>

			 						</tbody>
								</table>';

	echo'<table class="table table-bordered">
				<tbody>';


	$sql = "SELECT t.nombre, t.telefono, t.email, t.cumpleaños, t.cargo as id_cargo,c.cargo, t.area FROM trabajadores_colegios t JOIN cargos c ON t.cargo=c.id  WHERE t.nombre !='' AND t.cargo !=6 AND t.id_colegio='".$_POST["cole"]."' GROUP BY t.nombre, t.cargo ORDER by t.cargo";

	$req = $bdd->prepare($sql);
	$req->execute();

	$direcs = $req->fetchAll();

	foreach($direcs as $direc) {

		if ($direc["id_cargo"] != 5) {

			echo'<tr>
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

			echo'<tr>
					<td><b>'.$direc["cargo"].' '.$materia["materia"].'</b>: '.$direc["nombre"].'</td><td><b>Celular:</b> '.$direc["telefono"].'</td>
				</tr>
				<tr>
					<td><b>E-mail:</b> '.$direc["email"].'</td>
					<td><b>Fecha de cumpleaños:</b> '.$direc["cumpleaños"].'</td>
				</tr>';

		}

		
	}
	echo'</tbody></table>';

	$sql_pre = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=1 AND id_periodo='".$_POST['periodo']."'";
	$req_pre = $bdd->prepare($sql_pre);
	$req_pre->execute();
	$gp_pre = $req_pre->fetch();
	$sql_jar = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=2 AND id_periodo='".$_POST['periodo']."'";
	$req_jar = $bdd->prepare($sql_jar);
	$req_jar->execute();
	$gp_jar = $req_jar->fetch();
	$sql_tra = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=3  AND id_periodo='".$_POST['periodo']."'";
	$req_tra = $bdd->prepare($sql_tra);
	$req_tra->execute();
	$gp_tra = $req_tra->fetch();
	$sql_1 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=4  AND id_periodo='".$_POST['periodo']."'";
	$req_1 = $bdd->prepare($sql_1);
	$req_1->execute();
	$gp_1 = $req_1->fetch();
	$sql_2 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=5  AND id_periodo='".$_POST['periodo']."'";
	$req_2 = $bdd->prepare($sql_2);
	$req_2->execute();
	$gp_2 = $req_2->fetch();
	$sql_3 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=6 AND id_periodo='".$_POST['periodo']."'";
	$req_3 = $bdd->prepare($sql_3);
	$req_3->execute();
	$gp_3 = $req_3->fetch();
	$sql_4 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=7  AND id_periodo='".$_POST['periodo']."'";
	$req_4 = $bdd->prepare($sql_4);
	$req_4->execute();
	$gp_4 = $req_4->fetch();
	$sql_5 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=8  AND id_periodo='".$_POST['periodo']."'";
	$req_5 = $bdd->prepare($sql_5);
	$req_5->execute();
	$gp_5 = $req_5->fetch();
	$sql_6 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=9  AND id_periodo='".$_POST['periodo']."'";
	$req_6 = $bdd->prepare($sql_6);
	$req_6->execute();
	$gp_6 = $req_6->fetch();
	$sql_7 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=10 AND  id_periodo='".$_POST['periodo']."'";
	$req_7 = $bdd->prepare($sql_7);
	$req_7->execute();
	$gp_7 = $req_7->fetch();
	$sql_8 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=11 AND  id_periodo='".$_POST['periodo']."'";
	$req_8 = $bdd->prepare($sql_8);
	$req_8->execute();
	$gp_8 = $req_8->fetch();
	$sql_9 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=12 AND id_periodo='".$_POST['periodo']."'";
	$req_9 = $bdd->prepare($sql_9);
	$req_9->execute();
	$gp_9 = $req_9->fetch();
	$sql_10 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=13 AND id_periodo='".$_POST['periodo']."'";
	$req_10 = $bdd->prepare($sql_10);
	$req_10->execute();
	$gp_10 = $req_10->fetch();
	$sql_11 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$_POST["cole"]."' AND id_grado=14 AND id_periodo='".$_POST['periodo']."'";
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


		echo'<table class="table table-bordered  poblacion">
		
					<thead>
					<tr ><td colspan="19"><b>INFORMACIÓN DE POBLACIÓN</b></td></tr>
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
					

		echo'<table class="table table-bordered">
					
					<thead>
					<tr ><td colspan="19"><center><b>MERCADO EDITORIAL</b></center></td></tr>
					<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></td><td><td></td></td><td colspan="2"><center>Posibilidad cambio</center></td></tr>
					<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></td><td><center>Seire primaria</center></td><td><center>Serie bach.</center></td><td><center>Primaria</td><td><center>Bachillerato</td></tr>
						<th>Grados:</th>
						<th>PRE</th>
						<th>JAR</th>
						<th>TRA</th>
						<th>1</th>
						<th>2</th>
						<th>3</th>
						<th>4</th>
						<th>5</th>
						<th>6</th>
						<th>7</th>
						<th>8</th>
						<th>9</th>
						<th>10</th>
						<th>11</th>
						<th></th>
						<th></th>
						<th></th>
					</thead>
					<tbody>
						<tr><td>Prescolar</td><td id="m11"></td><td id="m12"></td><td id="m13"></td><td id="m14"></td><td id="m15"></td><td id="m16"></td><td id="m17"></td><td id="m18"></td><td id="m19"></td><td id="m110"></td><td id="m111"></td><td id="m112"></td><td id="m113"></td><td id="m114"></td><td id="m1p"></td><td id="m1b"></td><td id="cp1"></td><td id="cb1"></td></tr>
						<tr><td>Español</td><td id="m31"></td><td id="m32"></td><td id="m33"></td><td id="m34"></td><td id="m35"></td><td id="m36"></td><td id="m37"></td><td id="m38"></td><td id="m39"></td><td id="m310"></td><td id="m311"></td><td id="m312"></td><td id="m313"></td><td id="m314"></td><td id="m3p"></td><td id="m3b"></td><td id="cp3"></td><td id="cb3"></td></tr>
						<tr><td>Comprension lectora</td><td id="m41"></td><td id="m42"></td><td id="m43"></td><td id="m44"></td><td id="m45"></td><td id="m46"></td><td id="m47"></td><td id="m48"></td><td id="m49"></td><td id="m410"></td><td id="m411"></td><td id="m412"></td><td id="m413"></td><td id="m414"></td><td id="m4p"></td><td id="m4b"></td><td id="cp4"></td><td id="cb4"></td></tr>
						<tr><td>Matemáticas</td><td id="m21"></td><td id="m22"></td><td id="m23"></td><td id="m24"></td><td id="m25"></td><td id="m26"></td><td id="m27"></td><td id="m28"></td><td id="m29"></td><td id="m210"></td><td id="m211"></td><td id="m212"></td><td id="m213"></td><td id="m214"></td><td id="m2p"></td><td id="m2b"></td><td id="cp2"></td><td id="cb2"></td></tr>
						<tr><td>Sociales</td><td id="m61"></td><td id="m62"></td><td id="m63"></td><td id="m64"></td><td id=m"65"></td><td id="m66"></td><td id="m67"></td><td id="m68"></td><td id="m69"></td><td id="m610"></td><td id="m611"></td><td id="m612"></td><td id="m613"></td><td id="m614"></td><td id="m6p"></td><td id="m6b"></td><td id="cp6"></td><td id="cb6"></td></tr>
						<tr><td>Ingles</td><td id="m71"></td><td id="m72"></td><td id="m73"></td><td id="m74"></td><td id="m75"></td><td id="m76"></td><td id="m77"></td><td id="m78"></td><td id="m79"></td><td id="m710"></td><td id="m711"></td><td id="m712"></td><td id="m713"></td><td id="m714"></td><td id="m7p"></td><td id="m7b"></td><td id="cp7"></td><td id="cb7"></td></tr>
						<tr><td>Artistica</td><td id="m81"></td><td id="m82"></td><td id="m83"></td><td id="m84"></td><td id="m85"></td><td id="m86"></td><td id="m87"></td><td id="m88"></td><td id="m89"></td><td id="m810"></td><td id="m811"></td><td id="m812"></td><td id="m813"></td><td id="m814"></td><td id="m8p"></td><td id="m8b"></td><td id="cp8"></td><td id="cb8"></td></tr>
						<tr><td>Plan lector</td><td id="m91"></td><td id="m92"></td><td id="m93"></td><td id="m94"></td><td id="m95"></td><td id="m96"></td><td id="m97"></td><td id="m98"></td><td id="m99"></td><td id="m910"></td><td id="m911"></td><td id="m912"></td><td id="m913"></td><td id="m914"></td><td id="m9p"></td><td id="m9b"></td><td id="cp9"></td><td id="cb9"></td></tr>
						<tr><td>Informática</td><td id="m101"></td><td id="m102"></td><td id="m103"></td><td id="m104"></td><td id="m105"></td><td id="m106"></td><td id="m107"></td><td id="m108"></td><td id="m109"></td><td id="m1010"></td><td id="m1011"></td><td id="m1012"></td><td id="m1013"></td><td id="m1014"></td><td id="m10p"></td><td id="m10b"></td><td id="cp10"></td><td id="cb10"></td></tr>
					</tbody>';

		$sql = "SELECT id_materia, id_grado, editorial, id_libro_eureka, libro, vigencia FROM mercado_editorial WHERE id_colegio='".$_POST["cole"]."' AND id_periodo='".$_POST["periodo"]."'";

		$req = $bdd->prepare($sql);
		$req->execute();

		$libros = $req->fetchAll();

		foreach($libros as $libro) {

			if ($libro["id_libro_eureka"] != 0) {

				$sql_serie = "SELECT id_materia, id_grado, pri_sec, libro FROM libros WHERE id='".$libro["id_libro_eureka"]."'";

				$req_serie = $bdd->prepare($sql_serie);
				$req_serie->execute();

				$libro_serie = $req_serie->fetch();


				if ($libro_serie["id_grado"]==15) {

					echo "<script>
					
						$('#m".$libro_serie["id_materia"]."4').text('X');
						$('#m".$libro_serie["id_materia"]."5').text('X');
						$('#m".$libro_serie["id_materia"]."6').text('X');
						$('#m".$libro_serie["id_materia"]."7').text('X');
						$('#m".$libro_serie["id_materia"]."8').text('X');
						$('#m".$libro_serie["id_materia"]."p').text('".$libro_serie["libro"]."');
				
					
					</script>";
				}else if ($libro_serie["id_grado"]==16) {
					
					echo "<script>
					
						$('#m".$libro_serie["id_materia"]."9').text('X');
						$('#m".$libro_serie["id_materia"]."10').text('X');
						$('#m".$libro_serie["id_materia"]."11').text('X');
						$('#m".$libro_serie["id_materia"]."12').text('X');
						$('#m".$libro_serie["id_materia"]."13').text('X');
						$('#m".$libro_serie["id_materia"]."14').text('X');
						$('#m".$libro_serie["id_materia"]."b').text('".$libro_serie["libro"]."');
				
					
					</script>";


				}else{
					echo "<script>
						$('#".$libro_serie["id_materia"]."".$libro_serie["id_grado"]."').text('X');
						$('#".$libro_serie["id_materia"]."s').text('".$libro_e["libro"]."');
					</script>";
				}
					

			}else{
				if ($libro["id_grado"]==15) {

					echo "<script>
					
						$('#m".$libro["id_materia"]."4').text('X');
						$('#m".$libro["id_materia"]."5').text('X');
						$('#m".$libro["id_materia"]."6').text('X');
						$('#m".$libro["id_materia"]."7').text('X');
						$('#m".$libro["id_materia"]."8').text('X');
						$('#m".$libro["id_materia"]."p').text('".$libro["libro"]."');
				
					
					</script>";
				}else if ($libro["id_grado"]==16) {
					
					echo "<script>
					
						$('#m".$libro["id_materia"]."9').text('X');
						$('#m".$libro["id_materia"]."10').text('X');
						$('#m".$libro["id_materia"]."11').text('X');
						$('#m".$libro["id_materia"]."12').text('X');
						$('#m".$libro["id_materia"]."13').text('X');
						$('#m".$libro["id_materia"]."14').text('X');
						$('#m".$libro["id_materia"]."b').text('".$libro["libro"]."');
				
					
					</script>";


				}
				

			}

			
			
			


				


	}

		echo "</tbody></table>";

					//areas objetivas
		echo'<table class="table table-bordered">
			<thead>
			<tr><td colspan="3"><center><b>AREAS OBJETIVAS</b></center></td></tr>
				<th>Título</th>
				<th>Materia</th>
				<th>Grado</th>
			</thead>
			<tbody>';

		$sql = "SELECT b.materia, c.grado, l.libro FROM areas_objetivas a JOIN libros l ON l.id=a.id_libro_eureka JOIN materias b ON a.id_materia=b.id JOIN grados c ON a.id_grado=c.id WHERE id_colegio='".$_POST['cole']."' AND a.definicion='0' AND id_periodo='".$_POST["periodo"]."'";

		$req = $bdd->prepare($sql);
		$req->execute();
		$libros = $req->fetchAll();

		foreach ($libros as $libro) {
			echo "<tr>";
			echo "<td>".$libro["libro"]."</td>";
			echo "<td>".$libro["materia"]."</td>";
			echo "<td>".$libro["grado"]."</td>";
			echo "</tr>";
		}
		echo'</tbody></table>';

					//adopciones
		echo'<table class="table table-bordered">
					
					<thead>
					<tr ><td colspan="18"><center><b>ADOPCIONES</b></center></td></tr>
					<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><center>Serie</center></td></tr>
						<th>Grados:</th>
						<th>PRE</th>
						<th>JAR</th>
						<th>TRA</th>
						<th>1</th>
						<th>2</th>
						<th>3</th>
						<th>4</th>
						<th>5</th>
						<th>6</th>
						<th>7</th>
						<th>8</th>
						<th>9</th>
						<th>10</th>
						<th>11</th>
						<th></th>
					</thead>
					<tbody>
						<tr><td>Prescolar</td><td id="11"></td><td id="12"></td><td id="13"></td><td id="14"></td><td id="15"></td><td id="16"></td><td id="17"></td><td id="18"></td><td id="19"></td><td id="110"></td><td id="111"></td><td id="112"></td><td id="113"></td><td id="114"></td><td id="1s"></td></tr>
						<tr><td>Español</td><td id="31"></td><td id="32"></td><td id="33"></td><td id="34"></td><td id="35"></td><td id="36"></td><td id="37"></td><td id="38"></td><td id="39"></td><td id="310"></td><td id="311"></td><td id="312"></td><td id="313"></td><td id="314"></td><td id="3s"></td></tr>
						<tr><td>Comprension lectora</td><td id="41"></td><td id="42"></td><td id="43"></td><td id="44"></td><td id="45"></td><td id="46"></td><td id="47"></td><td id="48"></td><td id="49"></td><td id="410"></td><td id="411"></td><td id="412"></td><td id="413"></td><td id="414"></td><td id="4s"></tr>
						<tr><td>Matemáticas</td><td id="21"></td><td id="22"></td><td id="23"></td><td id="24"></td><td id="25"></td><td id="26"></td><td id="27"></td><td id="28"></td><td id="29"></td><td id="210"></td><td id="211"></td><td id="212"></td><td id="213"></td><td id="214"></td><td id="2s"></td></tr>
						<tr><td>Sociales</td><td id="61"></td><td id="62"></td><td id="63"></td><td id="64"></td><td id="65"></td><td id="66"></td><td id="67"></td><td id="68"></td><td id="69"></td><td id="610"></td><td id="611"></td><td id="612"></td><td id="613"></td><td id="614"></td><td id="6s"></td></tr>
						<tr><td>Ingles</td><td id="71"></td><td id="72"></td><td id="73"></td><td id="74"></td><td id="75"></td><td id="76"></td><td id="77"></td><td id="78"></td><td id="79"></td><td id="710"></td><td id="711"></td><td id="712"></td><td id="713"></td><td id="714"></td><td id="7s"></td></tr>
						<tr><td>Artistica</td><td id="81"></td><td id="82"></td><td id="83"></td><td id="84"></td><td id="85"></td><td id="86"></td><td id="87"></td><td id="88"></td><td id="89"></td><td id="810"></td><td id="811"></td><td id="812"></td><td id="813"></td><td id="814"></td><td id="8s"></td></tr>
						<tr><td>Plan lector</td><td id="91"></td><td id="92"></td><td id="93"></td><td id="94"></td><td id="95"></td><td id="96"></td><td id="97"></td><td id="98"></td><td id="99"></td><td id="910"></td><td id="911"></td><td id="912"></td><td id="913"></td><td id="914"></td><td id="9s"></td></tr>
						<tr><td>Informática</td><td id="101"></td><td id="102"></td><td id="103"></td><td id="104"></td><td id="105"></td><td id="106"></td><td id="107"></td><td id="108"></td><td id="109"></td><td id="1010"></td><td id="1011"></td><td id="1012"></td><td id="1013"></td><td id="1014"></td><td id="10s"></td></tr>
					</tbody>';


	$sql = "SELECT l.pri_sec, l.id_grado,l.id_materia, p.cod_area FROM libros l JOIN presupuestos p ON l.id=p.id_libro JOIN grados g ON l.id_grado=g.id JOIN materias m ON m.id=l.id_materia WHERE p.id_periodo='1' AND p.definido='".$_POST['periodo']."' AND p.id_colegio='".$_POST['cole']."'";

	$req = $bdd->prepare($sql);
	$req->execute();

	$libros = $req->fetchAll();

	foreach($libros as $libro) {

		$sql_serie = "SELECT libro FROM libros WHERE id='".$libro["pri_sec"]."'";

		$req_serie = $bdd->prepare($sql_serie);
		$req_serie->execute();

		$libro_serie = $req_serie->fetch();
		
		

		if ($libro["cod_area"] !="") {

			$sql_go = "SELECT id_grado_otro FROM areas_objetivas WHERE codigo='".$libro["cod_area"]."'";

			$req_go = $bdd->prepare($sql_go);
			$req_go->execute();
			$go = $req_go->fetch();

			echo "<script>
				
				$('#".$libro["id_materia"]."".$go["id_grado_otro"]."').text('X');
			
				
			</script>";

		}else{



		}
		echo "<script>
				
				$('#".$libro["id_materia"]."".$libro["id_grado"]."').text('X');
				$('#".$libro["id_materia"]."s').text('".$libro_serie["libro"]."');
				
			</script>";

	}

	echo "</tbody></table>";

	echo'<table class="table table-bordered">
			<thead>
				<tr><td colspan="6"><center><b>DIRECTORIO DOCENTES</b></center></td></tr>
				<th>Nombre</th>
				<th>Materias</th>
				<th>Grado</th>
				<th>Télefono</th>
				<th>E-mail</th>
				<th>Cumpleaños</th>

			</thead>
			<tbody>';

	$sql = "SELECT t.nombre, t.telefono,t.email,t.cumpleaños, c.colegio, z.zona, u.nombres,u.apellidos, g.grado, m.materia FROM trabajadores_colegios t JOIN grados_materias gm ON gm.cod_profesor=t.codigo JOIN colegios c ON t.id_colegio=c.id JOIN cargos ca ON t.cargo=ca.id JOIN zonas z ON c.cod_zona=z.codigo JOIN usuarios u ON u.cod_zona=z.codigo JOIN grados g ON g.id=gm.id_grado JOIN materias m ON m.id=gm.id_materia WHERE c.id='".$_POST["cole"]."' AND t.nombre!='' GROUP BY t.nombre, g.grado, m.materia";

	$req = $bdd->prepare($sql);
	$req->execute();

	$profes = $req->fetchAll();

	foreach($profes as $profe) {
		echo "<tr>";
			echo "<td>".$profe["nombre"]."</td>";
			echo "<td>".$profe["materia"]."</td>";
			echo "<td>".$profe["grado"]."</td>";
			echo "<td>".$profe["telefono"]."</td>";
			echo "<td>".$profe["email"]."</td>";
			echo "<td>".$profe["cumpleaños"]."</td>";
		echo "</tr>";

	}
	echo "</tbody></table>";



	echo "<center><button class='btn btn-success hidden-print' id='imprimir'>Imprimir</button>";

	echo " <a href='../registro_colegios.php' class='btn btn-warning hidden-print'>Volver</a></center>";




	

?>
<script>
	$("#imprimir").click(function(){
		window.print();
	})
</script>
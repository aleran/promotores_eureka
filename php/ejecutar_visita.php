<?php
require_once("aut.php");
// Conexion a la base de datos
require_once('../conexion/bdd.php');

	$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

	$req_periodo = $bdd->prepare($sql_periodo);
	$req_periodo->execute();
	$gp_periodo = $req_periodo->fetch();

	//$color = $_POST['color'];
	$sql_v = "UPDATE visitas SET observaciones='".$_POST["comentarios"]."',fecha='".date("Y-m-d H:i:s")."', efectiva='".$_POST["efectiva"]."', longitud='".$_POST["longitud"]."', latitud='".$_POST["latitud"]."' WHERE id_plan_trabajo='".$_POST["id_visita"]."'";

		
		
		$query_v = $bdd->prepare( $sql_v );
		if ($query_v == false) {
		 print_r($bdd->errorInfo());
		 die ('Erreur prepare');
		}
		$sth_v = $query_v->execute();
		if ($sth_v == false) {
		 print_r($query_v->errorInfo());
		 die ('Erreur execute');
		}

		$sth_p = "UPDATE plan_trabajo SET resultado='1', color='#008000' WHERE id='".$_POST["id_visita"]."'";
		
		
		$query_p = $bdd->prepare( $sth_p );
		if ($query_p == false) {
		 print_r($bdd->errorInfo());
		 die ('Erreur prepare');
		}
		$sth_p = $query_p->execute();
		if ($sth_p == false) {
		 print_r($query_p->errorInfo());
		 die ('Erreur execute');
		}

	$sql_p = "SELECT id FROM visitas WHERE id_plan_trabajo='".$_POST["id_visita"]."'";
												
	$req = $bdd->prepare($sql);
	$req->execute();
	$num = $req->rowCount();


		if (isset($_POST["libro"])) {

		foreach ($_POST["libro"] as $libros => $libro) {
			$sql_m = "INSERT INTO mu_pre VALUES (null,'".$_POST["id_visita"]."','".$libro."')";
			
				
			$query_m = $bdd->prepare( $sql_m );
			if ($query_m == false) {
				print_r($bdd->errorInfo());
						die ('Erreur prepare');
							}
			$sth_m = $query_m->execute();
			if ($sth_m == false) {
				print_r($query_m->errorInfo());
						die ('Erreur execute');
			}
		}

	}
		

	


header('Location: ../calendar.php');

	
?>
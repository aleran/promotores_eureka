<?php
require_once("aut.php");
// Conexion a la base de datos
require_once('../conexion/bdd.php');

	$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

	$req_periodo = $bdd->prepare($sql_periodo);
	$req_periodo->execute();
	$gp_periodo = $req_periodo->fetch();

	//$color = $_POST['color'];

	if (isset($_POST["libro"])) {

		


		$sql_v = "INSERT INTO visitas(id_periodo,id_plan_trabajo,observaciones,efectiva,latitud,longitud) values ('".$gp_periodo["id"]."','".$_POST["id_visita"]."', '".$_POST["comentarios"]."','".$_POST["efectiva"]."','".$_POST["latitud"]."', '".$_POST["longitud"]."')";
		
			
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

	}
	else{
		$sql_v = "INSERT INTO visitas(id_periodo,id_plan_trabajo,observaciones,efectiva,latitud,longitud) values ('".$gp_periodo["id"]."','".$_POST["id_visita"]."', '".$_POST["comentarios"]."','".$_POST["efectiva"]."','".$_POST["latitud"]."', '".$_POST["longitud"]."')";
		
		
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
	}


header('Location: ../calendar.php');

	
?>

<?php
	require_once("../php/aut.php");
	include("../conexion/bdd.php");


	foreach ($_POST["presupuesto_p"] as $presups => $presup) {

		list($libro,$tasa_c,$descuento, $precio) = explode("/", $presup);

		$sql = "SELECT columna FROM libros WHERE id='".$presup."'";

		$req = $bdd->prepare($sql);
		$req->execute();
		$con_colum = $req->fetch();	
		

		$sql_cod = "SELECT p.id_libro, g.id_grado FROM presupuestos p JOIN libros g ON g.id=p.id_libro WHERE p.cod_area='".$presup."'";
			$req_cod = $bdd->prepare($sql_cod);
			$req_cod->execute();

			$row_cod = $req_cod->fetch();

		if ($row_cod["id_grado"] != 17) {

			$sql_e = "UPDATE presupuestos SET pre_aprob='0' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_libro='".$presup."'";
		}else{

			$sql_e = "UPDATE presupuestos SET pre_aprob='0' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND cod_area='".$presup."'";

		}

		

		$query_e = $bdd->prepare( $sql_e );
		if ($query_e == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth_e = $query_e->execute();
		if ($sth_e == false) {
			print_r($query_e->errorInfo());
			die ('Erreur execute');
		}

	
		
				
	}

	$sql = "INSERT INTO notificaciones(id_periodo,id_colegio,id_tipo_notifi,visible) VALUES('".$_POST["periodo"]."','".$_POST["id_colegio"]."','3','1')";

		$query = $bdd->prepare( $sql );
		if ($query == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}

		$sth = $query->execute();
		if ($sth == false) {
			print_r($query->errorInfo());
			die ('Erreur execute');
		}

	$sql = "UPDATE notificaciones SET visible='0' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_tipo_notifi='1'";

		$query = $bdd->prepare( $sql );
		if ($query == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}

		$sth = $query->execute();
		if ($sth == false) {
			print_r($query->errorInfo());
			die ('Erreur execute');
		}
	

	header('Location: ../colegio.php?codigo='.$_POST["codigo"].'&periodo='.$_POST["periodo"].'');


?>
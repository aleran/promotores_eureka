<?php
	include("../conexion/bdd.php");


	$sql_st = "SELECT id FROM colegios_status  WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$_POST["periodo"]."'";
	$req_st = $bdd->prepare($sql_st);
	$req_st->execute();
	$status = $req_st->fetch();

	if (empty($status)) {
		
		$sql_e = "INSERT INTO colegios_status (id_colegio,id_periodo,id_status,observaciones) VALUES ('".$_POST["id_colegio"]."', '".$_POST["periodo"]."', '4', '".$_POST["observaciones"]."')";

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

	}else{

		$sql_e = "UPDATE colegios_status SET id_status='4', observaciones='".'".$_POST["observaciones"]."'."' WHERE id_colegio='".$_GET["colegio"]."' AND id_periodo='".$_GET["periodo"]."'";

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


		echo "<script>alert('Colegio descartado');window.location='../index.php';</script>";

	
?>

<?php 
	require_once('../conexion/bdd.php');
	
		$sql_p="INSERT INTO mercado_editorial(id_periodo,id_colegio,id_materia,id_grado,editorial,libro) VALUES('1','".$_POST["id_colegio"]."', '".$_POST["materia"]."', '".$_POST["grado"]."', '".$_POST["editorial"]."','".$_POST["libro"]."')";

		$query_p = $bdd->prepare( $sql_p );
		if ($query_p == false) {
		 print_r($bdd->errorInfo());
		 die ('Erreur prepare');
		}
		$sth_p = $query_p->execute();
		if ($sth_p == false) {
		 print_r($query_p->errorInfo());
		 die ('Erreur execute');
		}

	header('Location: ../colegio.php?codigo='.$_POST["cod_colegio"].'');
	
?>
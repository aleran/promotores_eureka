<?php 
	require_once('../conexion/bdd.php');
	
		$sql_p="INSERT INTO areas_objetivas(id_periodo,id_colegio,id_materia,id_grado,libro) VALUES('1','".$_POST["id_colegio"]."', '".$_POST["materia1"]."', '".$_POST["grado1"]."', '".$_POST["libro2"]."')";

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
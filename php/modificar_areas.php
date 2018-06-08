<?php 
	require_once('../conexion/bdd.php');
	
		$sql_p="UPDATE areas_objetivas SET libro='".$_POST["libro2"]."' WHERE id='".$_POST["id_area"]."'";

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
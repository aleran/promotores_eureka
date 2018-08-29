<?php 
	require_once('../conexion/bdd.php');


	if (isset($_POST["id_libro"])) {

		
		$sql_p="UPDATE libros SET precio='".$_POST["precio"]."' WHERE id='".$_POST["id_libro"]."'";

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


	}


	header('Location: ../libros.php');
	
?>
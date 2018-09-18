<?php 
	require_once('../conexion/bdd.php');


	if (isset($_POST["id_libro"])) {

		
		$sql = "SELECT id_grado FROM libros WHERE id='".$_POST["id_libro"]."'";

		$req = $bdd->prepare($sql);
		$req->execute();

		$libros = $req->fetch();

		if ($libros["id_grado"] ==15 || $libros["id_grado"] ==16) {
			
			$sql_p1="UPDATE libros SET presupuesto='".$_POST["presupuesto"]."' WHERE id='".$_POST["id_libro"]."'";

			$query_p1 = $bdd->prepare( $sql_p1 );
			if ($query_p1 == false) {
			 print_r($bdd->errorInfo());
			 die ('Erreur prepare');
			}
			$sth_p1 = $query_p1->execute();
			if ($sth_p1 == false) {
			 print_r($query_p1->errorInfo());
			 die ('Erreur execute');
			}

			$sql_p="UPDATE libros SET presupuesto='".$_POST["presupuesto"]."' WHERE pri_sec='".$_POST["id_libro"]."'";

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

		else {

			$sql_p="UPDATE libros SET precio='".$_POST["precio"]."', presupuesto='".$_POST["presupuesto"]."' WHERE id='".$_POST["id_libro"]."'";

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

		


	}


	header('Location: ../libros.php');
	
?>
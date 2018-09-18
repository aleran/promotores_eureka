<?php
	include("../conexion/bdd.php");
	if (isset($_POST["libro"])) {
	


			$sql_z = "INSERT INTO libros(id_materia, id_grado, libro, precio, pri_sec, presupuesto) VALUES('".$_POST["materia"]."', '".$_POST["grado"]."', '".$_POST["libro"]."', '".$_POST["precio"]."', '".$_POST["serie"]."', '".$_POST["presupuesto"]."')";
		
			//echo $sql_z;
			
			$query_z = $bdd->prepare( $sql_z );
			if ($query_z == false) {
			 print_r($bdd->errorInfo());
			 die ('Erreur prepare');
			}
			$sth_z = $query_z->execute();
			if ($sth_z == false) {
			 print_r($query_z->errorInfo());
			 die ('Erreur execute');
			}

		
	}
	
?>
<script>alert('Libro creado correctamente');window.location="../libros.php";</script>;
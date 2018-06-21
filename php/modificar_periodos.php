<?php
	
		include("../conexion/bdd.php");

		$sql = "UPDATE periodos SET periodo='".$_POST["periodo"]."', f_cierre='".$_POST["f_cierre"]."' WHERE id='".$_POST["id_periodo"]."'";


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
		


?>
<script>alert('Datos actualizados correctamente');window.location="../ver_periodos.php";</script>;
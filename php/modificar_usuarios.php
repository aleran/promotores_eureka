<?php
	
		include("../conexion/bdd.php");
		if ($_POST["clave"]!="") {

			$sql = "UPDATE usuarios SET nombres='".$_POST["nombres"]."', apellidos='".$_POST["apellidos"]."', telefono='".$_POST["telefono"]."', correo='".$_POST["correo"]."',  clave='".md5($_POST["clave"])."' WHERE id='".$_POST["id_usuario"]."'";
		}
		else {

			$sql = "UPDATE usuarios SET nombres='".$_POST["nombres"]."', apellidos='".$_POST["apellidos"]."', telefono='".$_POST["telefono"]."', correo='".$_POST["correo"]."' WHERE id='".$_POST["id_usuario"]."'";
		}
		


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
<script>alert('Datos actualizados correctamente');window.location="../usuarios.php";</script>;
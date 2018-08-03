<?php
	if (isset($_POST["colegio"])) {
	 
		include("../conexion/bdd.php");

		$sql = "UPDATE colegios SET colegio='".$_POST["colegio"]."', direccion='".$_POST["direccion"]."', barrio='".$_POST["barrio"]."', telefono='".$_POST["telefono_c"]."', web='".$_POST["web"]."', cumpleaños='".$_POST["cumpleaños_c"]."' WHERE codigo='".$_POST["cod_colegio"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}


	header('Location: ../colegio.php?codigo='.$_POST["cod_colegio"].'&periodo='.$_POST["periodo"].'');
?>

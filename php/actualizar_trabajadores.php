<?php
	if (isset($_POST["nombre"])) {
	 
		include("../conexion/bdd.php");

		$sql = "UPDATE trabajadores_colegios SET nombre='".$_POST["nombre"]."', telefono='".$_POST["celular"]."', email='".$_POST["email"]."', cumpleaños='".$_POST["cumpleaños"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id='".$_POST["id"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre1"])) {
	 
		include("../conexion/bdd.php");

		$sql = "UPDATE trabajadores_colegios SET nombre='".$_POST["nombre1"]."', telefono='".$_POST["celular1"]."', email='".$_POST["email1"]."', cumpleaños='".$_POST["cumpleaños1"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id='".$_POST["id1"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre2"])) {
	 
		include("../conexion/bdd.php");

		$sql = "UPDATE trabajadores_colegios SET nombre='".$_POST["nombre2"]."', telefono='".$_POST["celular2"]."', email='".$_POST["email2"]."', cumpleaños='".$_POST["cumpleaños2"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id='".$_POST["id2"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre3"])) {
	 
		include("../conexion/bdd.php");

		$sql = "UPDATE trabajadores_colegios SET nombre='".$_POST["nombre3"]."', telefono='".$_POST["celular3"]."', email='".$_POST["email3"]."', cumpleaños='".$_POST["cumpleaños3"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id='".$_POST["id3"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre4"])) {
	 
		include("../conexion/bdd.php");

		$sql = "UPDATE trabajadores_colegios SET nombre='".$_POST["nombre4"]."', telefono='".$_POST["celular4"]."', email='".$_POST["email4"]."', cumpleaños='".$_POST["cumpleaños4"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id='".$_POST["id4"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre5"])) {
	 
		include("../conexion/bdd.php");

		$sql = "UPDATE trabajadores_colegios SET nombre='".$_POST["nombre5"]."', telefono='".$_POST["celular5"]."', email='".$_POST["email5"]."', cumpleaños='".$_POST["cumpleaños5"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id='".$_POST["id5"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre6"])) {
	 
		include("../conexion/bdd.php");

		$sql = "UPDATE trabajadores_colegios SET nombre='".$_POST["nombre6"]."', telefono='".$_POST["celular6"]."', email='".$_POST["email6"]."', cumpleaños='".$_POST["cumpleaños6"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id='".$_POST["id6"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}


?>
<script>alert('Datos actualizados correctamente');window.location="../ver_colegios.php";</script>;
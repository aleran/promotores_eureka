<?php
	include("../conexion/bdd.php");
	if (isset($_POST["nombre"])) {
	 
		$sql = "INSERT INTO trabajadores_colegios(id_colegio,cargo,nombre,telefono,email,cumpleaños) VALUES('".$_POST["id_colegio"]."', '1', '".$_POST["nombre"]."', '".$_POST["celular"]."', '".$_POST["email"]."', '".$_POST["cumpleaños"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre1"])) {

		$sql = "INSERT INTO trabajadores_colegios(id_colegio,cargo,nombre,telefono,email,cumpleaños) VALUES('".$_POST["id_colegio"]."', '2', '".$_POST["nombre1"]."', '".$_POST["celular1"]."', '".$_POST["email1"]."', '".$_POST["cumpleaños1"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}
	if (isset($_POST["nombre2"])) {

		$sql = "INSERT INTO trabajadores_colegios(id_colegio,cargo,nombre,telefono,email,cumpleaños) VALUES('".$_POST["id_colegio"]."', '3', '".$_POST["nombre2"]."', '".$_POST["celular2"]."', '".$_POST["email2"]."', '".$_POST["cumpleaños2"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre3"])) {

		$sql = "INSERT INTO trabajadores_colegios(id_colegio,cargo,nombre,area,telefono,email,cumpleaños) VALUES('".$_POST["id_colegio"]."', '5', '".$_POST["nombre4"]."', '3', '".$_POST["celular3"]."', '".$_POST["email3"]."', '".$_POST["cumpleaños3"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre4"])) {

		$sql = "INSERT INTO trabajadores_colegios(id_colegio,cargo,nombre,area,telefono,email,cumpleaños) VALUES('".$_POST["id_colegio"]."', '5', '".$_POST["nombre4"]."', '2', '".$_POST["celular4"]."', '".$_POST["email4"]."', '".$_POST["cumpleaños4"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre5"])) {

		$sql = "INSERT INTO trabajadores_colegios(id_colegio,cargo,nombre,area,telefono,email,cumpleaños) VALUES('".$_POST["id_colegio"]."', '5', '".$_POST["nombre5"]."', '6', '".$_POST["celular5"]."', '".$_POST["email5"]."', '".$_POST["cumpleaños5"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre6"])) {

		$sql = "INSERT INTO trabajadores_colegios(id_colegio,cargo,nombre,area,telefono,email,cumpleaños) VALUES('".$_POST["id_colegio"]."', '5', '".$_POST["nombre6"]."', '7', '".$_POST["celular6"]."', '".$_POST["email6"]."', '".$_POST["cumpleaños6"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	header('Location: ../colegio.php?codigo='.$_POST["cod_colegio"].'');
?>
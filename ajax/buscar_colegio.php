<?php
	require_once("../php/aut.php");
	require_once('../conexion/bdd.php');  
	$colegio=$_POST["colegio"];
	if ($_SESSION["tipo"]==1) {
		$sql = "SELECT id,colegio FROM colegios WHERE colegio like'%".$colegio."%'";
	}
	else {

		$sql = "SELECT id,colegio FROM colegios WHERE colegio like'%".$colegio."%' AND cod_zona='".$_SESSION["zona"]."'";
	}
	
	$req = $bdd->prepare($sql);
	$req->execute();
	$colegios = $req->fetchAll();

	foreach($colegios as $colegio) {
		$colegio1=$colegio["colegio"];
		echo "<div class='suggest-element_c'><a id='".$colegio["id"]."' data-colegio='".$colegio1."'>$colegio1</a></div>";
	}
?>
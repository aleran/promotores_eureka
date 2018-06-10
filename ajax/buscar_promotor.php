<?php
	require_once('../conexion/bdd.php');  
	$promotor=$_POST["promotor"];
	$sql = "SELECT id,nombres,apellidos FROM usuarios WHERE tipo='3' AND nombres like'%".$promotor."%'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$promotores = $req->fetchAll();
	foreach($promotores as $promotor) {
		$trabajador=$promotor['nombres']." ".$promotor['apellidos'];
		echo "<div class='suggest-element'><a data-promo='".$trabajador."' id='".$promotor["id"]."'>$trabajador</a></div>";

	}
?>
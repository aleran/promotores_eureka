<?php
	require_once('../conexion/bdd.php');  
	list($profesor, $colegio) = explode("/", $_POST["profesor"]);
	$sql = "SELECT id,nombre FROM trabajadores_colegios WHERE id_colegio='".$colegio."' AND nombre like'%".$profesor."%' AND cargo='6'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$profesores = $req->fetchAll();

	foreach($profesores as $profesor) {
		$trabajador=$profesor['nombre'];
		echo "<div class='suggest-element'><a data-profe='".$trabajador."' id='".$profesor["id"]."'>$trabajador</a></div>";
	}
?>
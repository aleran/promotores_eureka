<?php
	require_once('../conexion/bdd.php');  
	$libro=$_POST["libro"];
	$sql = "SELECT id, libro FROM libros WHERE libro like'%".$libro."%'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$libros = $req->fetchAll();

	foreach($libros as $lib) {
		$libro1=$lib["libro"];
		echo "<div class='suggest-element1'><a data-libro='".$libro1."' id='".$lib["id"]."'>$libro1</a></div>";
	}
?>
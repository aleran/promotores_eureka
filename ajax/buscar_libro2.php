<?php
	require_once('../conexion/bdd.php');  
	$libro=$_POST["libro"];
	$sql = "SELECT libro FROM areas_objetivas WHERE libro like'%".$libro."%' group by libro";
	$req = $bdd->prepare($sql);
	$req->execute();
	$libros = $req->fetchAll();

	foreach($libros as $lib) {
		$libro1=$lib["libro"];
		echo "<div class='suggest-element2'><a data-libro='".$libro1."'>$libro1</a></div>";
	}
?>
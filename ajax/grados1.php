<?php
	require_once('../conexion/bdd.php'); 
	$sql = "SELECT id, grado FROM grados a WHERE NOT EXISTS (SELECT id FROM areas_objetivas b WHERE a.id=b.id_grado AND b.id_materia='".$_POST["materia"]."')";

	$req = $bdd->prepare($sql);
	$req->execute();
	$grados = $req->fetchAll();
	echo"<option value=''>Seleccionar</option>";
	foreach($grados as $grado) {
		$id = $grado['id'];
		$nom = $grado['grado'];
		echo '<option value="'.$id.'">'.$nom.'</option>';
	}
?>
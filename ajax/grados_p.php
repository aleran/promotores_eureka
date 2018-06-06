<?php
	require_once('../conexion/bdd.php');
	list($materia,$colegio)=explode("/", $_POST["materia"]);
	$sql = "SELECT id, grado FROM grados a WHERE NOT EXISTS (SELECT id FROM grados_materias b WHERE a.id=b.id_grado AND b.id_materia='".$materia."' AND b.id_colegio='".$colegio."')";

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
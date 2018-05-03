<?php

// Conexion a la base de datos
require_once('../conexion/bdd.php');

	

	//$color = $_POST['color'];


	$sql_v = "INSERT INTO visitas(id_periodo,id_plan_trabajo,observaciones,latitud,longitud) values ('1','".$_POST["id_visita"]."', '".$_POST["comentarios"]."','".$_POST["latitud"]."', '".$_POST["longitud"]."')";
	
	echo $sql_v;
	
	$query_v = $bdd->prepare( $sql_v );
	if ($query_v == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth_v = $query_v->execute();
	if ($sth_v == false) {
	 print_r($query_v->errorInfo());
	 die ('Erreur execute');
	}

	$sth_p = "UPDATE plan_trabajo SET resultado='1', color='#008000' WHERE id='".$_POST["id_visita"]."'";
	
	echo $sth_p;
	
	$query_p = $bdd->prepare( $sth_p );
	if ($query_p == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth_p = $query_p->execute();
	if ($sth_p == false) {
	 print_r($query_p->errorInfo());
	 die ('Erreur execute');
	}


header('Location: ../calendar.php');

	
?>

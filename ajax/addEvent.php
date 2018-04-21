<?php

// Conexion a la base de datos
require_once('../conexion/bdd.php');

if (isset($_POST['colegio']) &&  isset($_POST['profesor']) && isset($_POST['objetivo']) && isset($_POST['start']) && isset($_POST['end'])){
	
	$colegio = $_POST['colegio'];
	$profesor = $_POST['profesor'];
	$objetivo = $_POST['objetivo'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	//$color = $_POST['color'];

	$sql = "INSERT INTO plan_trabajo(id_periodo,id_promotor,id_colegio,id_profesor,id_objetivo,resultado,color,start,end) values ('1', '1', '$colegio', '$profesor', '$objetivo','0','#0071c5', '$start', '$end')";
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>

<?php
require_once("../php/aut.php");
// Conexion a la base de datos
require_once('../conexion/bdd.php');

if (isset($_POST['cole']) &&  isset($_POST['profesor']) && isset($_POST['objetivo']) && isset($_POST['start']) && isset($_POST['end'])){

	$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

	$req_periodo = $bdd->prepare($sql_periodo);
	$req_periodo->execute();
	$gp_periodo = $req_periodo->fetch();
	
	$colegio = $_POST['cole'];
	$profesor = $_POST['profesor'];
	$objetivo = $_POST['objetivo'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	//$color = $_POST['color'];


    $sql = "SELECT codigo FROM trabajadores_colegios WHERE id='".$_POST["profe"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$codigo = $req->fetch();
	$cod_profesor =$codigo["codigo"];
	

	
	$sql = "INSERT INTO plan_trabajo(id_periodo,id_promotor,id_colegio,cod_profesor,id_objetivo,resultado,color,start,end) values ('".$gp_periodo["id"]."', '".$_SESSION['id']."', '$colegio', '$cod_profesor', '$objetivo','0','#0071c5', '$start', '$end')";
	
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

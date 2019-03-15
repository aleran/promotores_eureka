<?php
	include("../conexion/bdd.php");

$sql_e = "UPDATE colegios_status SET id_status='4' WHERE id_colegio='".$_GET["colegio"]."' AND id_periodo='".$_GET["periodo"]."'";

	$query_e = $bdd->prepare( $sql_e );
	if ($query_e == false) {
		print_r($bdd->errorInfo());
		die ('Erreur prepare');
	}
	$sth_e = $query_e->execute();
	if ($sth_e == false) {
		print_r($query_e->errorInfo());
		die ('Erreur execute');
	}
		echo "<script>alert('Colegio descartado');window.location='../ver_colegios.php';</script>";

	
?>

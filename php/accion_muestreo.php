<?php
	include("../conexion/bdd.php");


	if (isset($_GET["rechazar"])) {
		
		$sql = "UPDATE muestreos SET estado='3' WHERE id='".$_GET["rechazar"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		echo "<script>alert('Muestreo Rechazado');window.location='../lista_muestreo.php';</script>";
	}elseif (isset($_GET["aprobar"])) {

		$sql = "UPDATE muestreos SET estado='2', observaciones='".$_GET["observaciones"]."' WHERE id='".$_GET["aprobar"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		echo "<script>alert('Muestreo Aprobado');window.location='../lista_muestreo.php';</script>";

	}else{

		$sql = "UPDATE muestreos SET estado='4' WHERE id='".$_GET["entregado"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		include("../recibo_muestras.php");
		header("location: /..muestreo_aprobados.php");
	}

	
?>

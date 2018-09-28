<?php
	require_once("../php/aut.php");
	include("../conexion/bdd.php");

	foreach ($_POST["presupuesto"] as $presups => $presup) {

		list($libro,$tasa_c,$descuento,$precio) = explode("/", $presup);
		$sql_e = "UPDATE presupuestos SET precio='".$precio."', tasa_compra='".$tasa_c."', descuento='".$descuento."', fecha='".date("Y-m-d")."' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_libro='".$libro."'";

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
				
	}
	header('Location: ../colegio.php?codigo='.$_POST["codigo"].'&periodo='.$_POST["periodo"].'');


?>
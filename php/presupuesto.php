<?php
	require_once("../php/aut.php");
	include("../conexion/bdd.php");

	foreach ($_POST["presupuesto"] as $presups => $presup) {

		list($libro,$tasa_c,$descuento, $precio) = explode("/", $presup);
		
			
			$sql_e = "INSERT INTO presupuestos(id_periodo,id_colegio, id_libro, precio, tasa_compra,descuento) values ('".$_POST["periodo"]."','".$_POST["id_colegio"]."','".$libro."','".$precio."', '".$tasa_c."', '".$descuento."')";

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
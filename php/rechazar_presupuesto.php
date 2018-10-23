<?php
	require_once("../php/aut.php");
	include("../conexion/bdd.php");


	foreach ($_POST["presupuesto_p"] as $presups => $presup) {

		list($libro,$tasa_c,$descuento, $precio) = explode("/", $presup);

		$sql = "SELECT columna FROM libros WHERE id='".$presup."'";

		$req = $bdd->prepare($sql);
		$req->execute();
		$con_colum = $req->fetch();	
		

		$sql_e = "UPDATE presupuestos SET pre_aprob='0' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_libro='".$presup."'";

		

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


	

	//header('Location: ../colegio.php?codigo='.$_POST["codigo"].'&periodo='.$_POST["periodo"].'');


?>
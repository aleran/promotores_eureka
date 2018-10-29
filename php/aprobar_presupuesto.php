<?php
	require_once("../php/aut.php");
	include("../conexion/bdd.php");



	$sql = "SELECT MAX(fila) as fila FROM presupuestos WHERE id_periodo='".$_POST["periodo"]."'";

	$req = $bdd->prepare($sql);
	$req->execute();
	$con_fila = $req->fetch();

	if ($con_fila["fila"] > 0) {

		$fila=$con_fila["fila"] + 1;
	}
	else {

		$fila=2;
	}

	foreach ($_POST["presupuesto_p"] as $presups => $presup) {

		list($libro,$tasa_c,$descuento, $precio) = explode("/", $presup);

		$sql = "SELECT columna FROM libros WHERE id='".$presup."'";

		$req = $bdd->prepare($sql);
		$req->execute();
		$con_colum = $req->fetch();	
		if ($tasa_c=="") {

			$sql_e = "UPDATE presupuestos SET aprobado='1', pre_definido='1', fila='".$fila."', columna='".$con_colum["columna"]."' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_libro='".$presup."'";

		}else {

			$sql_e = "UPDATE presupuestos SET aprobado='1', pre_definido='1', tasa_compra='".$tasa_c."',descuento='".$descuento."', fila='".$fila."', columna='".$con_colum["columna"]."' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_libro='".$presup."'";
		}
		

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

	$sql = "INSERT INTO notificaciones(id_periodo,id_colegio,id_tipo_notifi,visible) VALUES('".$_POST["periodo"]."','".$_POST["id_colegio"]."','2','1')";

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

	$sql = "UPDATE notificaciones SET visible='0' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_tipo_notifi='1'";

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


	

	//header('Location: ../colegio.php?codigo='.$_POST["codigo"].'&periodo='.$_POST["periodo"].'');


?>
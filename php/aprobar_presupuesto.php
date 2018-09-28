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


	foreach ($_POST["presupuesto"] as $presups => $presup) {

		$sql = "SELECT MAX(columna) as columna FROM presupuestos WHERE id_periodo='".$_POST["periodo"]."' AND id_libro='".$presup."'";

		$req = $bdd->prepare($sql);
		$req->execute();
		$con_colum = $req->fetch();

		if ($con_colum["columna"] > 0) {

			$columna=$con_colum["columna"];

			
		}
		else {
			
			
			$sql = "SELECT MAX(columna) as columna FROM presupuestos WHERE id_periodo='".$_POST["periodo"]."'";

			$req = $bdd->prepare($sql);
			$req->execute();
			$con_colum = $req->fetch();

			if ($con_colum["columna"] > 0) {
				$columna = $con_colum["columna"]+1;
			}

			else {

				$columna=10;
			}

		}



		$sql_e = "UPDATE presupuestos SET aprobado='1', fila='".$fila."', columna='".$columna."' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_libro='".$presup."'";

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
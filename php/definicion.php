<?php
	require_once("../php/aut.php");
	include("../conexion/bdd.php");


	
	$sql_fcole = "SELECT MAX(fila) as fila FROM presupuestos WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."'";

	$req_fcole = $bdd->prepare($sql_fcole);
	$req_fcole->execute();
	$fcole = $req_fcole->fetch();

	if ($fcole["fila"] > 0) {

		$fila= $fcole["fila"];

	}else {

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
	}
	

	foreach ($_POST["definir"] as $definiciones => $definir) {

		list($libro,$id_presupuesto) = explode("/", $definir);


		$sql2 = "SELECT aprobado FROM presupuestos WHERE id='".$id_presupuesto."'";
		$req2 = $bdd->prepare($sql2);
		$req2->execute();
		$row2 = $req2->fetch();	

		if ($row2["aprobado"]==1) {

			$sql_e = "UPDATE presupuestos SET definido='1' WHERE id='".$id_presupuesto."'";

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
			
		}else{



				$sql = "SELECT columna FROM libros WHERE id='".$libro."'";

				$req = $bdd->prepare($sql);
				$req->execute();
				$con_colum = $req->fetch();

				$sql_e = "UPDATE presupuestos SET definido='1', fila='".$fila."', columna='".$con_colum["columna"]."' WHERE id='".$id_presupuesto."'";

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

		
	
		
		
				
	}


	

	header('Location: ../colegio.php?codigo='.$_POST["codigo"].'&periodo='.$_POST["periodo"].'');


?>
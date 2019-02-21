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
	
		if ($_SESSION["tipo"] ==1) {

			//Busco los que ya estan definidos en ese colegio
			$sqld = "SELECT id FROM presupuestos WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$_POST["periodo"]."' AND definido='1'";
			$reqd = $bdd->prepare($sqld);
			$reqd->execute();
			$s_defs = $reqd->fetchAll();


			foreach($s_defs as $s_def) {
				$defs[]=$s_def["id"];

			}
		}


	foreach ($_POST["definir"] as $definiciones => $definir) {

		list($libro,$id_presupuesto) = explode("/", $definir);
		
		//almaceno en un array los que se marcaron como definidos
		$defs2[]=$id_presupuesto;

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

	if ($_SESSION["tipo"] ==1) {
		
		foreach ($defs as $d => $valor) {
			//Buscos los que estan definidos en el colegio en el arreglo de los que se marcaron como definidos
			if (!in_array($valor, $defs2)) {


				$sql_e = "UPDATE presupuestos SET definido='0' WHERE id='".$valor."'";

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

	}
	
	

	header('Location: ../colegio.php?codigo='.$_POST["codigo"].'&periodo='.$_POST["periodo"].'');


?>
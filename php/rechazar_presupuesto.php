<?php
	require_once("../php/aut.php");
	include("../conexion/bdd.php");


	if (isset($_POST["aprobar"])) {
		
	
	//Busco los que ya estan definidos en ese colegio
	$sqld = "SELECT id FROM presupuestos WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$_POST["periodo"]."' AND aprobado='1'";
	$reqd = $bdd->prepare($sqld);
	$reqd->execute();
	$s_defs = $reqd->fetchAll();

	foreach($s_defs as $s_def) {
		;
		$defs[]=$s_def["id"];

	}

	foreach ($_POST["aprobar"] as $aprobados => $aprobado) {

		$defs2[]=$aprobado;


	}

	foreach ($defs as $d => $valor) {
			//Buscos los que estan definidos en el colegio en el arreglo de los que se marcaron como definidos
			if (!in_array($valor, $defs2)) {


				$sql_e = "UPDATE presupuestos SET aprobado='0', pre_definido='0' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$_POST["periodo"]."' AND id='".$valor."'";

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

	
	}else{

		$sql_e = "UPDATE presupuestos SET pre_aprob='0', aprobado='0' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND pre_aprob='1'";

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
				

	$sql = "INSERT INTO notificaciones(id_periodo,id_colegio,id_tipo_notifi,visible) VALUES('".$_POST["periodo"]."','".$_POST["id_colegio"]."','3','1')";

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
	

	header('Location: ../colegio.php?codigo='.$_POST["codigo"].'&periodo='.$_POST["periodo"].'');


?>
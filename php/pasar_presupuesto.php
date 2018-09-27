<?php
	require_once("../php/aut.php");
	include("../conexion/bdd.php");




	foreach ($_POST["pre_aprob"] as $presups => $presup) {

		list($libro,$pre_aprob) = explode("/", $presup);
		echo $pre_aprob."<br>";

		$libs_e[]=$libro;

		$sql_e = "UPDATE presupuestos SET pre_aprob='".$pre_aprob."'  WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_libro='".$libro."'";

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



	$sql = "SELECT id_libro FROM presupuestos WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."'";

		$req = $bdd->prepare($sql);
		$req->execute();

		$libs = $req->fetchAll();

		foreach ($libs as $lib) {

			
			if (!in_array($lib["id_libro"], $libs_e)) {

				$sql = "UPDATE presupuestos SET pre_aprob='0' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_libro='".$lib["id_libro"]."'";

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
			
			}
		}


	
	


	

	header('Location: ../colegio.php?codigo='.$_POST["codigo"].'&periodo='.$_POST["periodo"].'');


?>
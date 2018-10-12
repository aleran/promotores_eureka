<?php
	require_once("../php/aut.php");
	include("../conexion/bdd.php");



	foreach ($_POST["presupuesto_d"] as $presups => $presup) {

		list($libro,$tasa_c,$descuento, $precio) = explode("/", $presup);

		
		if ($tasa_c=="") {

			$sql2 = "SELECT id,tasa_compra,descuento,tasa_compra_d,descuento_d FROM presupuestos WHERE id_libro='".$presup."' AND id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$_POST["periodo"]."'";
			$req2 = $bdd->prepare($sql2);
			$req2->execute();
			$row2 = $req2->fetch();	

			if ($row2["tasa_compra_d"]==0.00) {
		

				$sql_e = "UPDATE presupuestos SET tasa_compra_d='".$row2["tasa_compra"]."', descuento_d='".$row2["descuento"]."' WHERE id='".$row2["id"]."'";

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

		

		}else {

			$sql_e = "UPDATE presupuestos SET  tasa_compra_d='".$tasa_c."',descuento_d='".$descuento."', precio='".$precio."' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_libro='".$libro."'";

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
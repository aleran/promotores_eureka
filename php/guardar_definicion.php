<?php
	require_once("../php/aut.php");
	include("../conexion/bdd.php");




	foreach ($_POST["presupuesto_p"] as $presups => $presup) {

		list($libro,$tasa_c,$descuento, $precio) = explode("/", $presup);

		
		if ($tasa_c=="") {

			$sql2 = "SELECT id,tasa_compra,descuento,tasa_compra_d,descuento_d FROM libros WHERE id='".$presup."'";
			$req2 = $bdd->prepare($sq2l);
			$req2->execute();
			$row2 = $req2->fetch();	

			if ($row2["tasa_compra_d"]==0.0) {

				$sql_e = "UPDATE presupuestos SET tasa_compra_d='".$row2["tasa_compra"]."', descuento_d='".$row2["descuento"]."'  WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_libro='".$presup."'";

			}

		

		}else {

			$sql_e = "UPDATE presupuestos SET  tasa_compra_d='".$tasa_c."',descuento_d='".$descuento."' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_libro='".$presup."'";
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


	

	header('Location: ../colegio.php?codigo='.$_POST["codigo"].'&periodo='.$_POST["periodo"].'');


?>
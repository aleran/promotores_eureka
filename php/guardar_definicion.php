<?php
	require_once("../php/aut.php");
	include("../conexion/bdd.php");



	foreach ($_POST["presupuesto_d"] as $presups => $presup) {

		list($libro,$tasa_c,$descuento, $precio, $precio_final) = explode("/", $presup);

		
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

			$sql_e = "UPDATE presupuestos SET  tasa_compra_d='".$tasa_c."',descuento_d='".$descuento."', precio='".$precio."', precio_venta_final='".$precio_final."' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND id_libro='".$libro."'";

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

	$sql_rec = "SELECT id FROM recursos WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."'";

	$req_rec = $bdd->prepare($sql_rec);
	$req_rec->execute();
	$num = $req_rec->rowCount();

	if ($num < 1 ) {

		$sql_e = "INSERT INTO recursos(id_periodo,id_colegio,recurso,valor_recurso, reintegro, valor_reintegro,id_canal,descripcion_canal,fecha,observaciones) VALUES ('".$_POST["periodo"]."', '".$_POST["id_colegio"]."', '".$_POST["recurso"]."','".$_POST["valor_recurso"]."', '".$_POST["reintegro"]."','".$_POST["valor_reintegro"]."','".$_POST["canal"]."','".$_POST["descripcion"]."','".date("Y-m-d")."','".$_POST["observaciones"]."')";

	}else {

		$sql_e = "UPDATE recursos SET recurso='".$_POST["recurso"]."', valor_recurso='".$_POST["valor_recurso"]."', reintegro='".$_POST["reintegro"]."', valor_reintegro='".$_POST["valor_reintegro"]."', id_canal='".$_POST["canal"]."', descripcion_canal='".$_POST["descripcion"]."', fecha='".date("Y-m-d")."', observaciones='".$_POST["observaciones"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$_POST["periodo"]."'";
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
	

	header('Location: ../colegio.php?codigo='.$_POST["codigo"].'&periodo='.$_POST["periodo"].'');


?>